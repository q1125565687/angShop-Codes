using AspShop.Models;
using AspShop.RepositoryModel;
using System;
using System.Collections.Generic;
using System.Linq;
using System.Web;
using System.Web.Mvc;

namespace AspShop.Controllers
{
    public class AdminController : Controller
    {
        // GET: Admin
        public ActionResult Index()
        {
            return View();
        }

        // GET: Admin
        public ActionResult Account()
        {
            ViewBag.menuActive = "Admin";
            GetAspCookie();
            return View(AccountRepo.listAccount);
        }

        // GET: Admin
        public ActionResult Category()
        {
            ViewBag.menuActive = "Admin";
            GetAspCookie();
            return View(CategoryRepo.listCategory);
        }

        // GET: Admin
        public ActionResult Goods()
        {
            ViewBag.menuActive = "Admin";
            GetAspCookie();
            return View(GoodsRepo.listGoods);
        }

        // GET: Admin
        public ActionResult AccountEdit(int id)
        {
            GetAspCookie();
            ViewBag.menuActive = "Admin";
            return View(AccountRepo.GetOneAccountByNum(id));
        }

        // POST: Account Edit update
        [HttpPost]
        public ActionResult AccountEdit(Account account)
        {
            int i = AccountRepo.GetAccountNumByID(account.account_id);

            AccountRepo.listAccount[i] = account;

            return RedirectToAction("Account", "Admin");
        }

        // GET: Admin
        public ActionResult AccountDelete(int id)
        {
            AccountRepo.DelOneAccountByNum(id);

            return RedirectToAction("Account", "Admin");
        }

        // GET: Admin
        public ActionResult AccountCreate()
        {
            GetAspCookie();
            ViewBag.menuActive = "Admin";
            return View(AccountRepo.listAccount[0]);
        }

        // POST: Admin Save Create
        [HttpPost]
        public ActionResult AccountCreate(Account account)
        {
            account.account_id = AccountRepo.GetAccountMaxID() + 1;

            AccountRepo.listAccount.Add(account);

            return RedirectToAction("Account", "Admin");
        }

        // GET: Admin
        public ActionResult CategoryEdit(int id)
        {
            GetAspCookie();
            ViewBag.menuActive = "Admin";
            return View(CategoryRepo.GetOneCategoryByNum(id));
        }

        // POST: Cart Edit update
        [HttpPost]
        public ActionResult CategoryEdit(Category category)
        {
            int i = CategoryRepo.GetCategoryNumByID(category.cat_id);

            CategoryRepo.listCategory[i] = category;

            return RedirectToAction("Category", "Admin");
        }


        // GET: Admin
        public ActionResult CategoryDelete(int id)
        {
            CategoryRepo.DelOneCategoryByID(id);

            return RedirectToAction("Category", "Admin");
        }

        // GET: Admin
        public ActionResult CategoryCreate()
        {
            GetAspCookie();
            ViewBag.menuActive = "Admin";
            ViewBag.MyCatSelectList = CategoryRepo.GetPCatSelectList();

            return View(CategoryRepo.listCategory[0]);
        }

        // POST: Admin Save Create
        [HttpPost]
        public ActionResult CategoryCreate(Category category)
        {
            category.cat_id = CategoryRepo.GetCategoryMaxID(category.parent_id) + 1;

            CategoryRepo.listCategory.Add(category);

            return RedirectToAction("Category", "Admin");
        }

        // GET: Admin
        public ActionResult GoodsEdit(int id)
        {
            GetAspCookie();
            ViewBag.menuActive = "Admin";
            return View(GoodsRepo.GetOneGoods(id));
        }

        [HttpPost]
        public ActionResult GoodsEdit(Goods goods)
        {
            GetAspCookie();
            int i = GoodsRepo.GetGoodsNumByID(goods.goods_id);

            GoodsRepo.listGoods[i] = goods;

            return RedirectToAction("Goods", "Admin");
        }


        // GET: Admin
        public ActionResult GoodsDelete(int id)
        {
            GoodsRepo.DeletOneGoods(id);

            return RedirectToAction("Goods", "Admin");
        }

        // GET: Admin
        public ActionResult GoodsCreate()
        {
            GetAspCookie();
            ViewBag.menuActive = "Admin";
            // FOR SELECT Goods Category
            ViewBag.MySubCatSelectList = CategoryRepo.GetSubCatSelectList();

            return View(GoodsRepo.listGoods[0]);
        }

        // POST: Admin Save Create
        [HttpPost]
        public ActionResult GoodsCreate(Goods goods)
        {
            goods.goods_id = GoodsRepo.GetGoodsMaxID() + 1;

            goods.last_update = DateTime.Now;

            GoodsRepo.listGoods.Add(goods);

            return RedirectToAction("Goods", "Admin");
        }

        private string GetAspCookie()
        {
            CookieHelper cookieHelper = new CookieHelper();

            ViewBag.loginUser = cookieHelper.GetCookie(CookieHelper.USER_NAME);

            return (ViewBag.loginUser);
        }
    }
}