using AspShop.Models;
using System;
using System.Collections.Generic;
using System.Linq;
using System.Web;

namespace AspShop.RepositoryModel
{
    public class AccountRepo
    {
        public const int MAX_CATEGORY = 10;
        public static List<Account> listAccount;

        public AccountRepo()
        {
            // Keep just assign one time
            if (listAccount != null)
                return;

            listAccount = new List<Account>();

            listAccount.Add(new Account()
            {
                account_id = 1,
                username = "admin",
                password = "123456",
                firstName = "admin",
                lastName = "Smith",
                email = "jsmith1@my.bcit.ca",
                phone = "(778) 899-1083",
                address = "160 SW Marine Dr."
            });

            listAccount.Add(new Account()
            {
                account_id = 2,
                username = "tom",
                password = "1",
                firstName = "Tom",
                lastName = "Tompson",
                email = "ttompson001@google.com",
                phone = "(778) 555-5559",
                address = "123 SW Marine Dr."
            });

            listAccount.Add(new Account()
            {
                account_id = 3,
                username = "bob",
                password = "1",
                firstName = "Bob",
                lastName = "Smith",
                email = "bsmith000@google.com",
                phone = "(778) 555-5515",
                address = "111 SW Marine Dr."
            });
        }

        public static Account SampleAccount(int num)
        {
            if (num < listAccount.Count)
                return listAccount[num];
            else
                return listAccount[0];  // ?? Error
        }

        public static Boolean FindAccount(string username)
        {
            foreach (Account a in listAccount)
            {
                if (a.username.CompareTo(username) == 0)
                    return true;
            }
            return false; 
        }

        public static int GetAccountNum(string username)
        {
            for (int i = 0; i < listAccount.Count; i++)
            {

                if (listAccount[i].username.CompareTo(username) == 0)
                    return i;
            }
            return -1;   //?? Error
        }

        public static void DelOneAccountByNum(int id)
        {
            var i=0;

            for ( i = 0; i < listAccount.Count; i++)
            {
                if (listAccount[i].account_id == id)
                    break;
            }
            listAccount.RemoveAt(i);
        }


        public static Account GetOneAccountByNum(int id)
        {
            foreach (var item in listAccount)
            {
                if (item.account_id == id)
                    return item;
            }
            return null;
        }



        public static int AddOneAccount(Account account)
        {
            var num = 0;

            foreach (var item in listAccount)
            {
                if (item.account_id > num)
                    num = item.account_id;
            }

            account.account_id = ++num;

            listAccount.Add(account);

            return num;
        }

        public static int GetAccountNumByID(int id)
        {
            var i = 0;

            for (i = 0; i < listAccount.Count; i++)
            {
                if (listAccount[i].account_id == id)
                    return i;
            }
            return -1;
        }

        public static int GetAccountMaxID()
        {
            var id = 0;
            foreach (var item in listAccount)
            {
                if (item.account_id > id)
                    id = item.account_id;
            }
            return id;
        }
    }
}