using System;
using System.Collections.Generic;
using System.ComponentModel.DataAnnotations;
using System.Linq;
using System.Web;

namespace AspShop.Models
{
    public class Cart
    {

        [Display(Name = "Goods_ID")]
        public int goods_id { get; set; }

        [Display(Name = "Goods Name")]
        public string goods_name { get; set; }

        [Display(Name = "Shop Price")]
        public decimal shop_price { get; set; }

        [Display(Name = "Quantity")]
        public int quantity { get; set; }

        [Display(Name = "SubCount")]
        public decimal subCount { get; set; }

    }
}