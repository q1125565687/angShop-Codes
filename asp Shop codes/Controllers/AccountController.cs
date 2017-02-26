using AspShop.Models;
using AspShop.RepositoryModel;
using System;
using System.Collections.Generic;
using System.Linq;
using System.Web;
using System.Web.Mvc;

namespace AspShop.Controllers
{
    public class AccountController : Controller
    {
        // GET: Account
        public ActionResult Index()
        {
            return View();
        }

        // GET: Edit Goods
        public ActionResult Login()
        {
            //ViewBag.MyViewBagList = CategoryRepo.GetMenuList();
            ViewBag.menuActive = "Login";
            ViewBag.loginUser = "";

            return View();
        }

        // POST: Login 
        [HttpPost]
        public ActionResult Login(Account account)
        {
            //ViewBag.MyViewBagList = CategoryRepo.GetMenuList();
            ViewBag.loginUser = "";

            ViewBag.ErrorMessage = "";
            if (ModelState.IsValid)
            {
                // model is valid...
                if(AccountRepo.FindAccount(account.username))
                {
                    ViewBag.ErrorMessage = "Success!";

                    SetAspCookie(account.username);

                    return RedirectToAction("ShowCartNp", "Home");
                }
            }

            ViewBag.ErrorMessage = "No this user: " + account.username + ", relogin please.";

            return View(account);
        }


        private string GetAspCookie()
        {
            CookieHelper cookieHelper = new CookieHelper();

            ViewBag.loginUser = cookieHelper.GetCookie(CookieHelper.USER_NAME);

            return (ViewBag.loginUser);
        }


        private void SetAspCookie(string account)
        {
            CookieHelper cookieHelper = new CookieHelper();

            cookieHelper.ClearCookie(CookieHelper.USER_NAME);

            cookieHelper.SetCookie(CookieHelper.USER_NAME, account);
            ViewBag.loginUser = account;
        }


        // Test:
        public ActionResult ShowInfor()
        {
            return Content("Hello World!");
            //return DateTime.Now;
        }


        //  http://localhost:xxx/HelloWorld/Welcome/3?name=Rick

        public string Welcome(string name, int ID = 1)
        {
            return HttpUtility.HtmlEncode("Hello " + name + ", ID: " + ID);
        }

        // GET: 
        public ActionResult Register()
        {
            ViewBag.menuActive = "Register";
            ViewBag.loginUser = "";

            return View(AccountRepo.listAccount[0]);
        }

        // POST: Login 
        [HttpPost]
        public ActionResult Register(Account account)
        {
            //ViewBag.menuActive = 4;
            ViewBag.loginUser = "";

            AccountRepo.AddOneAccount(account);
            SetAspCookie(account.username);

            return RedirectToAction("ShowCartNp", "Home");
        }

        // GET: 
        public ActionResult Logout()
        {
            ViewBag.loginUser = "";

            CookieHelper cookieHelper = new CookieHelper();
            cookieHelper.ClearCookie(CookieHelper.USER_NAME);

            return RedirectToAction("ShowCartNp", "Home");
        }
    }
}