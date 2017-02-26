import { Component, AfterContentInit, OnInit } from '@angular/core';
import { ActivatedRoute, Params, Router }   from '@angular/router';
//import { RouteParams }      from '@angular/router-deprecated';
import { Location }                 from '@angular/common';
import { CartItem, OrdInfo, OrdGoods }                 from '../data/defineClass';
import { CartService }              from '../services/cart.service';
import { OrderService }             from '../services/order.service';

// 导入switchMap运算符，之后会与路由参数Observable一起使用。
import 'rxjs/add/operator/switchMap';


@Component({
  selector: 'app-cart',
  templateUrl: './cart.component.html',
  styleUrls: ['./cart.component.css']
})

//export class CartComponent implements AfterContentInit {
  export class CartComponent implements OnInit {

  private cartItems: Array<CartItem>;

  // For : route.params.subscribe(params => {}
  private sub: any;
  private paramItemFromUrl: CartItem;   // Come from Url
  //private paramFlag:        boolean;    // Come from Url


  private ordersArray: Array<any>;
  private ordGoodsArray: Array<any>;

  constructor(
      private cartService: CartService,
      private orderService: OrderService,
      private route: ActivatedRoute,
      //private routeParams: RouteParams,
      private router: Router,
      private location: Location
  ) {}


  //ngAfterContentInit() {
  ngOnInit() {

    // init
    this.paramItemFromUrl = { id : -1, goods_id: 4, goods_name: 'iPhone 6s88', shop_price: 621.34, quantity: 2};

    console.log(this.route.params);

    /*
    this.route.params
        .switchMap((params: Params) => this.heroService.getHero(+params['id']))
        .subscribe(hero => this.hero = hero);
*/

    /*
    This way can  not get : import { RouteParams, Router } from '@angular/router-deprecated';  ???
    let id = this.routeParams.get('id');

    this.paramItemFromUrl.goods_id = this.routeParams.get('goods_id'); // (+) converts string 'id' to a number
    this.paramItemFromUrl.goods_name = this.routeParams.get('goods_name');
    this.paramItemFromUrl.shop_price = this.routeParams.get('shop_price');
    this.paramItemFromUrl.quantity = 1;
*/



    this.sub = this.route.params.subscribe(params => {
      this.paramItemFromUrl.id = +params['goods_id'];
      this.paramItemFromUrl.goods_id = +params['goods_id']; // (+) converts string 'id' to a number
      this.paramItemFromUrl.goods_name = params['goods_name'];
      this.paramItemFromUrl.shop_price = +params['shop_price'];
      this.paramItemFromUrl.quantity = 1;

      //console.log(this.paramItemFromUrl.goods_id);
    });

    console.log(this.paramItemFromUrl);

    // If no parameter come in from url
    if(this.paramItemFromUrl.id > 0) {

        //console.log("this.route.parameterFromUrl = " + this.paramItemFromUrl);

        // First Add or Updat eone to cart , in the Memory first !!!!
        this.findOneItemAfterGetAll(this.paramItemFromUrl);

        // For get Max ID
        this.getOrder();

        // For get Max ID
        this.getOrdGoods();
    }

  }


// In  then() ,  call a new function ************
  private findOneItemAfterGetAll(item : CartItem): Promise<CartItem> {

    return this.getCartItems()
        .then(() => this.findItemAddOne_Memory(item));
        //.then(() => item.account ++ );
  }

  // Do in Array
  private findItemAddOne(item : CartItem) {

    for(let i = 0; i<this.cartItems.length; i++ ){

      if( this.cartItems[i].goods_id == item.goods_id ) {
        console.log("find it and account ++ ");
        this.cartItems[i].quantity ++;
        return true;
      }

    }
    console.log("new one, and add to memory array ! ");
    this.cartItems.push(item);
    return false;
  }


  // Do in Memory
  private findItemAddOne_Memory(item : CartItem) {

    for(let i = 0; i<this.cartItems.length; i++ ){

      if( this.cartItems[i].goods_id == item.goods_id ) {
        console.log("find it and account ++ ");
        this.cartItems[i].quantity ++;

        this.updateItem(this.cartItems[i]);
        return true;
      }

    }
    console.log("new one, and add to memory array ! ");
    //this.cartItems.push(item);
    this.addItem(item);

    return false;
  }

  private getCartItems(): Promise<CartItem[]> {

    return this.cartService.getCartItems()
        .then(cartItems => this.cartItems = cartItems);
  }

  // add to in-memory-data
  private addItem(item: CartItem): void {
    //if (!item) { return; }
    this.cartService.createOneItem(item)
        .then(oneItem => {
          this.cartItems.push(oneItem);
          //this.selectedTeacher = null;
        });
  }


  // update to in-memory-data
  private updateItem(item: CartItem): void {
    //if (!item) { return; }
    this.cartService.updateOneItem(item);
       // .then(oneItem => {
       //   this.cartItems.push(oneItem);
          //this.selectedTeacher = null;
       // });
  }


  // delete to in-memory-data
  private deleteOne(item: CartItem): void {
    this.cartService
        .deleteOneItem(item)
        .then(() => {
          this.cartItems = this.cartItems.filter(h => h !== item);
        });
  }

  // add to in-Array-data
  private addItemToArray(item: CartItem): void {
    //if (!item) { return; }
    this.cartItems.push(item);
  }

  // delete to in-Array-data
  private deleteOneToArray(item: CartItem): void {

      this.cartItems = this.cartItems.filter(h => h !== item);
  }

  // Clear remove cart and DB
  clearCart(){

    //console.log(this.cartItems);

    var item;

    // From Array to index to delete Memory items :
    while (item = this.cartItems.pop()){

        this.deleteOne(item);
    }
    //console.log(this.cartItems);
  }

  reloadCart(){

    this.getCartItems();

  }


  //  For Create new order infor and order Goods items (two tables) to DB and go to order show page
  private confirmAndSaveOrder(){

    if((!this.cartItems) || (this.cartItems.length <= 0)) {
      alert(" Your cart is empty now !");
      return;
    }



    let newGoodsID = this.getOrdGoods_NewID();
    let newOrderID = this.getOrdGoods_NewID();

    var total_money = 0;

    for(let i=0; i<this.cartItems.length; i++) {

      total_money += (this.cartItems[i].quantity * this.cartItems[i].shop_price);

      let item1 = {
        ordgoods_id : newGoodsID++,
        ordinfo_id  : newOrderID,
        goods_id    : this.cartItems[i].goods_id,
        goods_name  : this.cartItems[i].goods_name,
        shop_price  : this.cartItems[i].shop_price,
        quantity    : this.cartItems[i].quantity
      }

      this.addOne_OrdGoodsItem(item1);

    }

    var m = new Date();
    var dateString =
        m.getUTCFullYear() +"-"+
        ("0" + (m.getUTCMonth()+1)).slice(-2) +"-"+
        ("0" + m.getUTCDate()).slice(-2) + " " +
        ("0" + m.getUTCHours()).slice(-2) + ":" +
        ("0" + m.getUTCMinutes()).slice(-2) + ":" +
        ("0" + m.getUTCSeconds()).slice(-2);

    let newOrdInfoitem = {
                ordinfo_id: newOrderID,
                ord_sn    : dateString,
                user_id   : 1,
                mobile    : "15966057988",
                money     : total_money,
                note      : "Order confirmed at "  + dateString
    };

    this.addOne_OrdInforItem(newOrdInfoitem);

    // Should go to order list ..., but does not know how to go ???????
    // Good Way !

    this.router.navigate( ['order/order/', { id: 1 }] );

    //this.router.navigate( ['order/order'] );

    /*
     It calls the router's navigate method with a Link Parameters Array.
     This array is similar to the link parameters array
     we met earlier in an anchor tag while binding to the RouterLink directive.
     This time we see it in code rather than in HTML.
     */


    // Here should clear cart items . Ready confirm order:

    this.clearCart();

  }

  // Below For Order part :  ------------------------------------------

  private getOrder(): Promise<OrdInfo[]> {

    return this.orderService.getOrdInforItems()
        .then(orders => this.ordersArray = orders);
  }


  private getOrdGoods(): Promise<OrdGoods[]> {

    return this.orderService.getOrdGoodsItems()
        .then(orders => this.ordGoodsArray = orders);
  }


  private getOrdGoods_NewID() {

    //console.log(this.ordersArray);

    this.ordersArray.sort(function(a, b){return b.ordinfo_id - a.ordinfo_id});

    return (this.ordersArray[0].ordinfo_id + 1);

  }


  // add to in-memory-data
  private addOne_OrdInforItem(item: OrdInfo): void {
    //if (!item) { return; }

    this.orderService.create_OrdInforItem(item);
  }

  // add to in-memory-data
  private addOne_OrdGoodsItem(item: OrdGoods): void {

    //if (!item) { return; }

    this.orderService.create_OrdGoodsItem(item);
  }

  goBack(): void {
    this.location.back();
  }

}
