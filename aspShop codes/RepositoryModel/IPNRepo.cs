using AspShop.Models;
using System;
using System.Collections.Generic;
using System.Linq;
using System.Web;

namespace AspShop.RepositoryModel
{
    public class IPNRepo
    {
        public static List<IPN> listIPN;

        public IPNRepo()
        {
            // Keep just assign one time
            if (listIPN != null)
                return;

            listIPN = new List<IPN>();

            listIPN.Add(new IPN()
            {
                transactionID = "1",
                txTime = DateTime.Now,
                custom = "1",
                buyerEmail = "abc@gmail.com",
                amount = 10.0m,
                paymentStatus = "Comlpeted",
                ItemName = " ",
                ItemNumber = "1",
                Quantity = "1",
                QuantityCartItems = "1",
                PaymentDate = DateTime.Now.ToString(),
                PayerFirstName = "John",
                PayerLastName = "Jim"
            });
        }

        public static IPN GetOneIPNBySessionID(string id)
        {
            foreach (var item in listIPN)
            {
                if (item.custom.Contains(id))
                    return (item);
            }
            //return (listIPN[0]);
            return null;
        }
    }
}