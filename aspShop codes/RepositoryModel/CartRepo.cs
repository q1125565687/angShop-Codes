using AspShop.Models;
using System;
using System.Collections.Generic;
using System.Linq;
using System.Web;

namespace AspShop.RepositoryModel
{
    public class CartRepo
    {
        public static List<Cart> listCart;

        public CartRepo()
        {
            // Keep just assign one time
            if (listCart != null)
                return;

            listCart = new List<Cart>();

            listCart.Add(new Cart()
            {
                goods_id = 1,
                goods_name = "iPhone 6s",
                shop_price = 769.99m,
                quantity = 1,
                subCount = 0
            });

            listCart.Add(new Cart()
            {
                goods_id = 2,
                goods_name = "iPhone 6s Plus",
                shop_price = 899.00m,
                quantity = 2,
                subCount = 0
            });
        }

        public static Cart GetOneByGoodsID(int id)
        {
            foreach (var item in listCart)
            {
                if (item.goods_id == id)
                    return (item);
            }
            return null;
        }

        public static void DeleteOneByGoodsID(int id)
        {
            var i = 0;
            for (i=0;  i < listCart.Count; i++)
            {
                if (listCart[i].goods_id == id)
                    break;
            }
            listCart.RemoveAt(i);
        }

        public static void UpdateOne(Cart cart)
        {
            for (var i = 0; i < listCart.Count; i++)
            {
                if (listCart[i].goods_id == cart.goods_id)
                {
                    listCart[i].quantity = cart.quantity;
                    return;
                }
            }
        }
    }
}