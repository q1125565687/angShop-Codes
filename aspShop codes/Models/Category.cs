using System;
using System.Collections.Generic;
using System.ComponentModel.DataAnnotations;
using System.Linq;
using System.Web;

namespace AspShop.Models
{
    public class Category
    {
        [Display(Name = "Cat_ID")]
        public int cat_id { get; set; }

        [Display(Name = "Parent_ID")]
        public int parent_id { get; set; }

        [Display(Name = "Category Name")]
        public string cat_name { get; set; }

        [Display(Name = "Description")]
        public string intro { get; set; }

    }
}