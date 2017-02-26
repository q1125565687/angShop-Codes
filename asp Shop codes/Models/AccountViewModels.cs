using System;
using System.Collections.Generic;
using System.ComponentModel.DataAnnotations;
using System.Linq;
using System.Web;

namespace AspShop.Models
{
    public class AccountViewModels
    {
       
    }

    public class Account
    {
        public int account_id { get; set; }

        [Required(ErrorMessage = "User Name required, and at least 2~6 length.")]
        [StringLength(16, MinimumLength = 2)]
        [Display(Name = "User Name")]
        [RegularExpression(@"(\S)+", ErrorMessage = "White space is not allowed")]
        public string username { get; set; }

        [Required]
        [Display(Name = "Password")]
        public string password { get; set; }

        [Display(Name = "First Name")]
        public string firstName { get; set; }
        [Display(Name = "Last Name")]
        public string lastName { get; set; }
        [Display(Name = "Email")]
        public string email { get; set; }

        [Display(Name = "Phone")]
        public string phone { get; set; }

        [Display(Name = "Address")]
        public string address { get; set; }

    }

}