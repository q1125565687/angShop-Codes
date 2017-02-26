
using System;
using System.Collections.Generic;
using System.ComponentModel.DataAnnotations;
using System.Data.Entity;
using System.Linq;
using System.Web;

namespace AspShop.Models
{
    public class IPN
    {
        [Key]
        [Display(Name = "Transaction ID")]
        public string transactionID { get; set; }
        [Display(Name = "Purchase Time")]
        public DateTime txTime { get; set; }
        [Display(Name = "Session ID")]
        public string custom { get; set; }
        [Display(Name = "Buyer Email")]
        public string buyerEmail { get; set; }
        [Display(Name = "Amount")]
        public decimal amount { get; set; }

        [Display(Name = "Status")]
        public string paymentStatus { get; set; }


        [Display(Name = "Item")]
        public string ItemName { get; set; }

        [Display(Name = "Item Numbers")]
        public string ItemNumber { get; set; }

        [Display(Name = "Total Tickets")]
        public string Quantity { get; set; }

        [Display(Name = "QuantityCartItems")]
        public string QuantityCartItems { get; set; }

        [Display(Name = "Payment Date")]
        public string PaymentDate { get; set; }

        [Display(Name = "First Name")]
        public string PayerFirstName { get; set; }

        [Display(Name = "Last Name")]
        public string PayerLastName { get; set; }

    }
}