using System;
using System.Collections.Generic;
using System.Linq;
using System.Web;

namespace AspShop.Models
{
    public class MenuItem
    {
        public string menuName { get; set; }
        public int menuPath { get; set; }
    }

    public class BtnMenuItem
    {
        public MenuItem mainMenu { get; set; }
        public List<MenuItem> dropMenu { get; set; }
    }
}