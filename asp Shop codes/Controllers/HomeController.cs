using AspShop.Models;
using AspShop.RepositoryModel;
using System;
using System.Collections.Generic;
using System.Linq;
using System.Web;
using System.Web.Mvc;
using PagedList;

namespace AspShop.Controllers
{
    public class HomeController : Controller
    {
        // GET: Home   init --  Search -- Sort -- list
        public ActionResult Index(string sortOrder, string currentFilter, string searchString, int? page)
        {
            CategoryRepo cr = new CategoryRepo();
            GoodsRepo    gr = new GoodsRepo();
            CartRepo   cart = new CartRepo();
            AccountRepo  ar = new AccountRepo();

            ViewBag.MyViewBagList = CategoryRepo.GetMenuList();
            ViewBag.menuActive = "Home";
            GetAspCookie();

            if (searchString != null)
                page = 1;
            else
                searchString = currentFilter;

            ViewBag.AbsolutePath = Request.Url.AbsolutePath ;

            // All can get it !!!
            //ViewBag.host1 =  Request.Url.Host + 
            //(Request.Url.IsDefaultPort ? "" : ":" + Request.Url.Port);

            IEnumerable<Goods> goods = GoodsRepo.GetGoods(searchString, sortOrder);

            // Store current search and sort filter parameters.
            ViewBag.CurrentFilter = searchString;
            ViewBag.CurrentSort = sortOrder;
    
            /*  Old query way :
            var query = GoodsRepo.listGoods
                .OrderBy(p => p.goods_id)
                .Where(prod => prod.cat_id == 1);

            var query1 = CategoryRepo.listCategory
                .Where(p => p.parent_id == 1);

            // Get Goods  From Parent ID 
            var query3 = from n in GoodsRepo.listGoods
                         let tmp = CategoryRepo.listCategory.Where(x => x.parent_id == 1).Select(x => x.cat_id)
                         where tmp.Contains(n.cat_id)
                         select n;
            // In Sql, get goods by parent_ID:
            //select goods_id, cat_id, goods_name  from goods  where cat_id in (select cat_id from cat where parent_id = 1)
            */

            // Provide toggle option for name sort.
            if (String.IsNullOrEmpty(sortOrder))
                ViewBag.NameSortParm = GoodsRepo.NAME;
            else
                ViewBag.NameSortParm = "";

            // Provide toggle  optionfor date sort.
            if (sortOrder == GoodsRepo.DATE)
                ViewBag.DateSortParm = GoodsRepo.DATE_DESC;
            else
                ViewBag.DateSortParm = GoodsRepo.DATE;

            const int PAGE_SIZE = 6;
            int pageNumber = (page ?? 1);

            // Truncate results to fit in the view provided.
            goods = goods.ToPagedList(pageNumber, PAGE_SIZE);

            return View(goods);
        }

        // GET: Home  -- Cat -- Sort -- list
        public ActionResult SortIndex(int id, string sortOrder)
        {
            ViewBag.MyViewBagList = CategoryRepo.GetMenuList();

            // Store current sort filter parameter.
            ViewBag.CurrentSort = sortOrder;
            GetAspCookie();
            ViewBag.menuActive = "Home";

            switch (sortOrder)
            {
                case GoodsRepo.NAME:
                    ViewBag.NameSortParm = GoodsRepo.NAME_DESC;
                    ViewBag.DateSortParm = GoodsRepo.DATE;
                    ViewBag.IdSortParm   = GoodsRepo.ID;
                    break;
                case GoodsRepo.NAME_DESC:
                    ViewBag.NameSortParm = GoodsRepo.NAME;
                    ViewBag.DateSortParm = GoodsRepo.DATE;
                    ViewBag.IdSortParm = GoodsRepo.ID;
                    break;
                case GoodsRepo.ID:
                    ViewBag.IdSortParm  = GoodsRepo.ID_DESC;
                    ViewBag.NameSortParm = GoodsRepo.NAME;
                    ViewBag.DateSortParm = GoodsRepo.DATE;
                    break;
                case GoodsRepo.ID_DESC:
                    ViewBag.IdSortParm = GoodsRepo.ID;
                    ViewBag.NameSortParm = GoodsRepo.NAME;
                    ViewBag.DateSortParm = GoodsRepo.DATE;
                    break;
                case GoodsRepo.DATE:
                    ViewBag.DateSortParm = GoodsRepo.DATE_DESC;
                    ViewBag.IdSortParm = GoodsRepo.ID;
                    ViewBag.NameSortParm = GoodsRepo.NAME;
                    break;
                case GoodsRepo.DATE_DESC:
                    ViewBag.DateSortParm = GoodsRepo.DATE;
                    ViewBag.IdSortParm = GoodsRepo.ID;
                    ViewBag.NameSortParm = GoodsRepo.NAME;
                    break;
                default:
                    ViewBag.DateSortParm = GoodsRepo.DATE;
                    ViewBag.IdSortParm = GoodsRepo.ID;
                    ViewBag.NameSortParm = GoodsRepo.NAME;
                    break;
            }

            if (id == 0)
            {   // ALL Goods, By sortOrder
                return View(GoodsRepo.SortGoods(GoodsRepo.listGoods, sortOrder));
            }

            if (id < 10)
            {
                // Get Goods  From Parent ID 
                var query = from n in GoodsRepo.listGoods
                            let tmp = CategoryRepo.listCategory.Where(x => x.parent_id == id).Select(x => x.cat_id)
                            where tmp.Contains(n.cat_id)
                            select n;

                return View(GoodsRepo.SortGoods(query, sortOrder));
            }

            // Get goods by cat_id and sortOrder
            return View(GoodsRepo.SortGoods(GoodsRepo.GetGoodsByCatID(GoodsRepo.listGoods, id), sortOrder));
        }


        // GET: Home
        public ActionResult ShowGoods(int id)
        {
            ViewBag.MyViewBagList = CategoryRepo.GetMenuList();
            ViewBag.menuActive = "Gallery";
            GetAspCookie();

            if ( Request.Url.Host.Contains("local"))
            {
                ViewBag.imgPath = "";

            } else { 

                ViewBag.imgPath = "aspshop/";
            }

            if (id == 0)
            {   // ALL button
                return View(GoodsRepo.listGoods);
            }

            if (id < 10)
            {
                // Get Goods  From Parent ID 
                var query = from n in GoodsRepo.listGoods
                            let tmp = CategoryRepo.listCategory.Where(x => x.parent_id == id).Select(x => x.cat_id)
                            where tmp.Contains(n.cat_id)
                            select n;

                ViewBag.goods = query.ToList();

                return View(query);
            }

            ViewBag.goods = GoodsRepo.GetGoodsByCatID(GoodsRepo.listGoods, id);

            return View(GoodsRepo.GetGoodsByCatID(GoodsRepo.listGoods, id));
        }

        // GET: Edit Goods
        public ActionResult GoodsEdit(int id, string type)
        {
            ViewBag.MyViewBagList = CategoryRepo.GetMenuList();
            //ViewBag.menuActive = "";
            GetAspCookie();
            ViewBag.menuActive = "Gallery";

            if (Request.Url.Host.Contains("localhost"))
            {
                ViewBag.imgPath = "/images/";
            }
            else
            {
                ViewBag.imgPath = "aspshop/images/";
            }

            if (!String.IsNullOrEmpty(type))
            {
                if( type == "1")
                {
                    // Next:
                    return View(GoodsRepo.GetNextGoods(id));
                }else
                {
                    return View(GoodsRepo.GetLastGoods(id));
                }
            }


            return View(GoodsRepo.GetOneGoods(GoodsRepo.listGoods, id));
        }

        // GET: Show Cart no param
        public ActionResult ShowCartNp()
        {
            // For Total infor
            var totalPieces = 0m;
            var totalPrice = 0m;
            ViewBag.menuActive = "Cart";


            GetAspCookie();


            for (var i = 0; i < CartRepo.listCart.Count; i++)
            {
                var item = CartRepo.listCart[i];

                totalPieces += item.quantity;
                item.subCount = item.shop_price * item.quantity;
                totalPrice += item.subCount;
            }

            ViewBag.totalPieces = totalPieces;
            ViewBag.totalPrice = totalPrice;

            return View(CartRepo.listCart);
        }

        // GET: 
        public ActionResult ShowCart(int id)
        {
            //ViewBag.MyViewBagList = CategoryRepo.GetMenuList();
            var flag = false;
            ViewBag.menuActive = "Cart";
            GetAspCookie();

            for (var i = 0; i < CartRepo.listCart.Count; i++)
            {
                var item = CartRepo.listCart[i];

                if (item.goods_id == id)
                {
                    item.quantity++;  
                    flag = true;
                    break;
                }
            }

            if (!flag)
            {
                var goods = GoodsRepo.GetOneGoods(GoodsRepo.listGoods, id);
                var temp = new Cart()
                {
                    goods_id = goods.goods_id,
                    goods_name = goods.goods_name,
                    shop_price = goods.shop_price,
                    quantity = 1,
                    subCount = 0
                };
                CartRepo.listCart.Add(temp);
            }

            // For Total infor
            var totalPieces = 0m;
            var totalPrice = 0m;
            for (var i = 0; i < CartRepo.listCart.Count; i++)
            {
                var item = CartRepo.listCart[i];

                totalPieces += item.quantity;
                item.subCount = item.shop_price * item.quantity;
                totalPrice += item.subCount;
            }

            ViewBag.totalPieces = totalPieces;
            ViewBag.totalPrice = totalPrice;

            return View(CartRepo.listCart);
        }

        // GET: Edit Cart
        public ActionResult EditCart(int id)
        {
            GetAspCookie();
            ViewBag.menuActive = "Cart";
            return View(CartRepo.GetOneByGoodsID(id));
        }

        // GET: Delete Cart
        public ActionResult DeleteCart(int id)
        {
            System.Diagnostics.Debug.WriteLine("delete goods_id = " + id);

            CartRepo.DeleteOneByGoodsID(id);

            return RedirectToAction("ShowCartNp", "Home");
        }


        // POST: Cart Edit update
        [HttpPost]
        public ActionResult CartEdit(Cart cart)
        {
            CartRepo.UpdateOne(cart);

            return RedirectToAction("ShowCartNp", "Home");
        }

        // POST: Search, and list search result 
        [HttpPost]
        public ActionResult Search(string search)
        {
            //return View(GoodsRepo.SearchGoodsByStr(search));
            return View(GoodsRepo.FilterGoods(GoodsRepo.listGoods, search));
        }

        private string GetAspCookie()
        {
            CookieHelper cookieHelper = new CookieHelper();

            ViewBag.loginUser = cookieHelper.GetCookie(CookieHelper.USER_NAME);

            return (ViewBag.loginUser);
        }

        // GET: Home
        public ActionResult About()
        {
            ViewBag.menuActive = "About";
            GetAspCookie();
            ViewBag.SessionUser = Session["username"];
            ViewBag.SessionID = this.Session.SessionID;

            return View();
        }

        public ActionResult OrderList()
        {
            ViewBag.SessionID = this.Session.SessionID;
            ViewBag.menuActive = "Order";

            return View(IPNRepo.listIPN.OrderByDescending(p => p.PaymentDate));
        }



 

    }
}