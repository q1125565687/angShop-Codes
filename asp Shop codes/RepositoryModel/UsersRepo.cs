using AspShop.Models;
using System;
using System.Collections.Generic;
using System.Linq;
using System.Web;

namespace AspShop.RepositoryModel
{
    public class UsersRepo
    {
        public static List<Account> listAccount;

        public UsersRepo()
        {
            // Keep just assign one time
            if (listAccount != null)
                return;

            listAccount = new List<Account>();

            listAccount.Add(new Account()
            {
                username = "jsmith1",
                password = "*****",
                firstName = "John",
                lastName = "Smith",
                email = "jsmith1@my.bcit.ca",
                phone = "(778) 899-1083",
                address = "160 SW Marine Dr."
            });

            listAccount.Add(new Account()
            {
                username = "tom001",
                password = "*****",
                firstName = "Tom",
                lastName = "Tompson",
                email = "ttompson001@google.com",
                phone = "(778) 555-5559",
                address = "123 SW Marine Dr."
            });

            listAccount.Add(new Account()
            {
                username = "bob000",
                password = "*****",
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

        public static Account SampleAccount(String username)
        {
            foreach (Account a in listAccount)
            {

                if (a.username.CompareTo(username) == 0)
                    return a;
            }
            return null; // ?? Error
        }

        public static int GetAccountNum(String username)
        {
            for (int i = 0; i < listAccount.Count; i++)
            {

                if (listAccount[i].username.CompareTo(username) == 0)
                    return i;
            }
            return -1;   //?? Error
        }
    }
}