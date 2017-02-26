using AspShop.Models;
using System;
using System.Collections.Generic;
using System.Linq;
using System.Web;
using System.Web.Mvc;

namespace AspShop.RepositoryModel
{
    public class CategoryRepo
    {
        public const int MAX_CATEGORY = 10;

        public static List<Category> listCategory;

        public CategoryRepo()
        {
            // Keep just assign one time
            if (listCategory != null)
                return;

            listCategory = new List<Category>();

            listCategory.Add(new Category()
            {
                cat_id = 1,
                parent_id = 0,
                cat_name = "Smart Phone",
                intro = "Smart Phone"
            });

            listCategory.Add(new Category()
            {
                cat_id = 2,
                parent_id = 0,
                cat_name = "Laptop",
                intro = "Laptop"
            });

            listCategory.Add(new Category()
            {
                cat_id = 3,
                parent_id = 0,
                cat_name = "Television",
                intro = "Television"
            });
            listCategory.Add(new Category()
            {
                cat_id = 11,
                parent_id = 1,
                cat_name = "iPhone",
                intro = "iPhone"
            });
            listCategory.Add(new Category()
            {
                cat_id = 12,
                parent_id = 1,
                cat_name = "Samsung",
                intro = "Samsung"
            });
            listCategory.Add(new Category()
            {
                cat_id = 13,
                parent_id = 1,
                cat_name = "HUAWEI",
                intro = "HUAWEI"

            });
            listCategory.Add(new Category()
            {
                cat_id = 21,
                parent_id = 2,
                cat_name = "Lenovo",
                intro = "lenovo"
            });
            listCategory.Add(new Category()
            {
                cat_id = 22,
                parent_id = 2,
                cat_name = "Dell",
                intro = "Dell"
            });
            listCategory.Add(new Category()
            {
                cat_id = 23,
                parent_id = 2,
                cat_name = "HP",
                intro = "HP"
            });

            listCategory.Add(new Category()
            {
                cat_id = 31,
                parent_id = 3,
                cat_name = "Hisense",
                intro = "Hisense"
            });
            listCategory.Add(new Category()
            {
                cat_id = 32,
                parent_id = 3,
                cat_name = "Samsung",
                intro = "Samsung"
            });
            listCategory.Add(new Category()
            {
                cat_id = 33,
                parent_id = 3,
                cat_name = "LG",
                intro = "LG"
            });
        }

        public static Category SampleCategory(int num)
        {

            if (num < listCategory.Count)
                return listCategory[num];
            else
                return listCategory[0];  // ?? Error
        }

        public static int GetCategoryNum(int CategoryID)
        {
            for (int i = 0; i < listCategory.Count; i++)
            {
                if (listCategory[i].cat_id == CategoryID)
                    return i;
            }
            return -1; // ?? Error
        }


        public static  List<BtnMenuItem> GetMenuList()
        {
            List<BtnMenuItem> menus = new List<BtnMenuItem>();

            foreach (var catItem in listCategory)
            {
                BtnMenuItem menuItem = new BtnMenuItem();

                if (catItem.parent_id == 0)   // Every parent_id == 0 的项，产生一个 Drop Menu 项-- 根节点 + 几个子节点 
                {
                    // First Root menu
                    MenuItem pointMenu_Root = new MenuItem();

                    pointMenu_Root.menuPath = catItem.cat_id;
                    pointMenu_Root.menuName = catItem.cat_name;

                    menuItem.mainMenu = pointMenu_Root;

                    List<MenuItem> subMenu = new List<MenuItem>();

                    foreach (var subCatItem in listCategory)
                    {
                        // Drop Menu
                        MenuItem pointMenu = new MenuItem();

                        if (subCatItem.parent_id == catItem.cat_id)
                        {
                            pointMenu.menuName = subCatItem.cat_name;
                            pointMenu.menuPath = subCatItem.cat_id;

                            subMenu.Add(pointMenu);
                        }
                    }

                    menuItem.dropMenu = subMenu;

                    menus.Add(menuItem);
                }
            }

            return menus;
        }

        // For Create Category drop down select list option
        public static List<SelectListItem> GetPCatSelectList()
        {
            List<SelectListItem> items = new List<SelectListItem>();

            items.Add(new SelectListItem { Text = "Root Category", Value = "0" });

            foreach (var catItem in listCategory)
            {
                if (catItem.parent_id == 0)   // Every parent_id == 0 的项，产生一个 Drop Menu 项-- 根节点 + 几个子节点 
                {
                    items.Add(new SelectListItem { Text = catItem.cat_name, Value = catItem.cat_id.ToString() });
                }
            }
            return items;
        }


        // For Create Goods Category drop down select list option
        public static List<SelectListItem> GetSubCatSelectList()
        {
            List<SelectListItem> items = new List<SelectListItem>();

            foreach (var catItem in listCategory)
            {
                if (catItem.parent_id != 0)   // Every parent_id == 0 的项，产生一个 Drop Menu 项-- 根节点 + 几个子节点 
                {
                    items.Add(new SelectListItem { Text = GetCatNameByCatID(catItem.parent_id) + " " + catItem.cat_name, Value = catItem.cat_id.ToString() });
                }
            }
            return items;
        }


        // For Create Goods Category drop down select list option
        public static string GetCatNameByCatID(int id)
        {
            foreach (var catItem in listCategory)
            {
                if (catItem.cat_id == id)   // Every parent_id == 0 的项，产生一个 Drop Menu 项-- 根节点 + 几个子节点 
                {
                    return catItem.cat_name;
                }
            }
            return null;
        }


        public static void DelOneCategoryByID(int id)
        {
            var i = 0;

            for (i = 0; i < listCategory.Count; i++)
            {
                if (listCategory[i].cat_id == id)
                    break;
            }
            listCategory.RemoveAt(i);
        }

        public static int GetCategoryNumByID(int id)
        {
            var i = 0;

            for (i = 0; i < listCategory.Count; i++)
            {
                if (listCategory[i].cat_id == id)
                    return i;
            }
            return -1;
        }

        public static int GetCategoryMaxID(int parent_id)
        {
            var id = 0;

            foreach (var item in listCategory)
            {
                // same parent_id
                if (( item.parent_id == parent_id) && (item.cat_id > id))
                    id = item.cat_id;
            }

            if( id == 0)
            {
                // First One this Category
                id = parent_id * MAX_CATEGORY;
            }
            return id;
        }

        public static Category GetOneCategoryByNum(int id)
        {
            foreach (var item in listCategory)
            {
                if (item.cat_id == id)
                    return item;
            }
            return null;
        }

    }
}