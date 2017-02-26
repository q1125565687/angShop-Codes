import { Component, OnInit, AfterContentInit } from '@angular/core';
import { ActivatedRoute, Params, Router }   from '@angular/router';
import { GoodsService }                     from '../services/goods.service';
import { Goods, Category, MenuItem }        from '../data/defineClass';
import { FormBuilder, Validators } from '@angular/forms';
// 导入switchMap运算符，之后会与路由参数Observable一起使用。
import 'rxjs/add/operator/switchMap';

@Component({
  selector: 'app-type-page',
  templateUrl: './type-page.component.html',
  styleUrls: ['./type-page.component.css']
})

export class TypePageComponent implements AfterContentInit {
  private goodsArray: Array<any>;
  private categories: Array<Category>;
  private menuMyItems: Array<MenuItem>;
  private tabItems:  Array<MenuItem>;

  private parameterTab: number;   // Come from Url

  // For : route.params.subscribe(params => {}
  private sub: any;


  constructor(private goodsService: GoodsService,
              private route: ActivatedRoute,
              private router: Router
              ) {

      this.menuMyItems = new Array();
      this.tabItems    = new Array();
  }

  //ngOnInit(): void {
  ngAfterContentInit() {

    this.sub = this.route.params.subscribe(params => {
      this.parameterTab = +params['cat_id']; // (+) converts string 'id' to a number
    });

    console.log("init : get Param , at last  cat_id =   " + this.parameterTab);

    // Create Menu Items Array by Category *****
    this.getCategoryThenMenu();

    // For tab;
    this.getCategoryThenTab( this.parameterTab );

    // Get Goods data for Current Page to show .....................
    switch (this.parameterTab) {

      case 1:
        // Just GeT all Smart Phones : cat_id = 1;  and their parent_id: 0
        this.goodsService
            .getGoods()
            .then(goods => this.goodsArray = goods.filter(good => ((good.cat_id === 11) ||
            (good.cat_id === 12) ||
            (good.cat_id === 13))));
        break;

      case 2:
        // Just GeT all Smart Phones : cat_id = 2;  and their parent_id: 0
        this.goodsService
            .getGoods()
            .then(goods => this.goodsArray = goods.filter(good => ((good.cat_id === 21) ||
            (good.cat_id === 22) ||
            (good.cat_id === 23))));
        break;

      case 3:
        // Just GeT all Smart Phones : cat_id = 3;  and their parent_id: 0
        this.goodsService
            .getGoods()
            .then(goods => this.goodsArray = goods.filter(good => ((good.cat_id === 31) ||
            (good.cat_id === 32) ||
            (good.cat_id === 33))));
        break;

      case 4:
        // Just GeT all Smart Phones : cat_id = 3;  and their parent_id: 0
        this.goodsService
            .getGoods()
            .then(goods => this.goodsArray = goods.filter(good => ((good.cat_id === 41) ||
            (good.cat_id === 42) ||
            (good.cat_id === 43))));
        break;

      case 5:
        // Just GeT all Smart Phones : cat_id = 3;  and their parent_id: 0
        this.goodsService
            .getGoods()
            .then(goods => this.goodsArray = goods.filter(good => ((good.cat_id === 51) ||
            (good.cat_id === 52) ||
            (good.cat_id === 53))));
        break;


      default :

        this.route.params
            .switchMap((params: Params) => this.goodsService.getGoodsByID(+params['cat_id']))
            .subscribe(goods => this.goodsArray = goods);

        break;
    }


    //console.log(" parameterTab cat_id " + this.parameterTab);
    // For Test !!!
    //document.getElementById("hh").innerHTML = " Cat_id : " + this.parameterTab;
  }

  private ngOnDestroy() {
    this.sub.unsubscribe();
  }

  private getCategory(): Promise<Category[]> {

    return this.goodsService.getCategory()
        .then(categories => this.categories = categories);
  }

  private getCategoryByID(id : number): Promise<Category[]> {

    return this.goodsService
        .getCategory()
        .then(categories => this.categories = categories.filter(item => item.parent_id === id ));
  }

// In  then() ,  call a new function ************
  private getCategoryThenMenu(): Promise<MenuItem[]> {

    return this.getCategoryByID(0)
        .then(() => this.createMenuItems());

  }

// In  then() ,  call a new function ************
  private getCategoryThenTab(id : number): Promise<MenuItem[]> {

    return this.getCategory()
        .then(() => this.createTabItems(id));
  }

  private showCat() {

    console.log("Cat[] length :  " + this.categories.length);

    for (let item of this.categories) {

      console.log("cat_id : " + item.cat_id);
      console.log("cat_name : " + item.cat_name);
      console.log("intro : " + item.intro);
      console.log("parent_id : " + item.parent_id);
    }
  }

  // Create Menu string array ..........................
  private createMenuItems() {

    //console.log("createMenuItems Method :  -----------------------");

    for (let i = 0; i < this.categories.length; i++) {

      if (this.categories[i].parent_id == 0) {

        let t = this.categories[i];
        let item = {
          id: 'menu' + i,
          parameterID: i + 1,                // 1,2,3 ....
          path: '/type-page/type-page/',
          linkName: t.cat_name,
          active: '',
          random : this.getRandomString(i+1)     // get random url tail for refresh
        };

        //let random = Math.random();

        if (this.getMenuActiveStatus(t.cat_id)) {
          item.active = 'active';
        }

        this.menuMyItems.push(item);

        //console.log(item);
      }
    }
  }

  getRandomString(len : number){

    let str = '';

    for( let i=0; i<len; i++){
      str += "/1";
    }
    //console.log(str);

    return str;
  }


  // Create tab string array ..........................
  private createTabItems(id : number )
  {

    //console.log("create Tab  Items Method :  ##################  ");

    let realID = id;
    let rootMenuNum = 0;

    // 11,12,13 => 1,2,3
    if( id > 10 ){
      id = Math.floor( id / 10 );
    }

    for (let i = 0; i < this.categories.length; i++) {

      if (this.categories[i].parent_id == id) {

        let t = this.categories[i];
        let item = {
          id: 'tab' + t.cat_id,
          parameterID: t.cat_id,
          path: '/type-page/type-page/',
          linkName: t.cat_name,
          active: '',
          // ?? + id , to add length for url ??
          random : this.getRandomString(this.categories[i].cat_id%10+id)     // get random url tail for refresh: because id is 11,12,13.. so %
        };


        if (this.getTabActiveStatus(t.cat_id)) {
          item.active = 'active';
        }

        // **** !!!!
        this.tabItems.push(item);

        //console.log(item);
      }
    }
  }

  private getMenuActiveStatus( id : number) {

    let i = this.parameterTab;

    // Take case  10 , one grade category can not greator than 10 !!!!!!!!!!!!!!!!!

    if( this.parameterTab >= 10 )
      i = Math.floor(this.parameterTab / 10 );

    if( i == id )
        return true;
    else
      return false;
  }


  private getTabActiveStatus( id : number) {

    let i = this.parameterTab;

    // Take case  10 , one grade category can not greator than 10 !!!!!!!!!!!!!!!!!

    if( id < 10 )
      return false;  // By menu selected, show all types , no active

    if( i == id )
      return true;
    else
      return false;
  }

  private detailOneGoods(): void {

      // Now by : <a href="/detail/detail/{{item.goods_id}}"  in html

      //console.log("router.navigate : /detail/detail : " + this.selectedTeacher.id);

      this.router.navigate(['/detail/detail', 1]);
  }


  showGoods(){

    console.log(this.goodsArray);

  }

  // TODO: Remove this when we're done
  get diagnostic() { return JSON.stringify(this.goodsArray); }

}



/*

 Using Route Parameters

 Say we are creating an application that displays a product list. When the user clicks on a product in the list, we want to display a page showing the detailed information about that product. To do this you must:
 add a route parameter ID
 link the route to the parameter
 add the service that reads the parameter.
 Declaring Route Parameters

 The route for the component that displays the details for a specific product would need a route parameter for the ID of that product. We could implement this using the following Routes:
 export const routes: Routes = [
 { path: '', redirectTo: 'product-list', pathMatch: 'full' },
 { path: 'product-list', component: ProductList },
 { path: 'product-details/:id', component: ProductDetails }
 ];
 Note :id in the path of the product-details route, which places the parameter in the path. For example, to see the product details page for product with ID 5, you must use the following URL: localhost:3000/product-details/5
 Linking to Routes with Parameters

 In the ProductList component you could display a list of products. Each product would have a link to the product-details route, passing the ID of the product:
 <a *ngFor="let product of products"
 [routerLink]="['/product-details', product.id]">
 {{ product.name }}
 </a>
 Note that the routerLink directive passes an array which specifies the path and the route parameter. Alternatively we could navigate to the route programmatically:
 goToProductDetails(id) {
 this.router.navigate(['/product-details', id]);
 }


 Reading Route Parameters  -------------

 The ProductDetails component must read the parameter, then load the product based on the ID given in the parameter.
 The ActivatedRoute service provides a params Observable which we can subscribe to to get the route parameters (see Observables).1

 import { Component, OnInit, OnDestroy } from '@angular/core';
 import { ActivatedRoute } from '@angular/router';

 @Component({
 selector: 'product-details',
 template: `
 <div>
 Showing product details for product: {{id}}
 </div>
 `,
 })


 export class LoanDetailsPage implements OnInit, OnDestroy {
 id: number;
 private sub: any;

 constructor(private route: ActivatedRoute) {}

 ngOnInit() {
 this.sub = this.route.params.subscribe(params => {
 this.id = +params['id']; // (+) converts string 'id' to a number

 // In a real app: dispatch action to load the details here.
 });
 }

 ngOnDestroy() {
 this.sub.unsubscribe();
 }
 }
 The reason that the params property on ActivatedRoute is an Observable is that the router may not recreate the component when navigating to the same component. In this case the parameter may change without the component being recreated.
 View Basic Example
 View Example with Programmatic Route Navigation
 View examples running in full screen mode to see route changes in the URL.


 https://angular-2-training-book.rangle.io/handout/routing/routeparams.html

 ????!!!!!

install This : for routerLink -----------------------

 npm install --save @angular/router-deprecated

then , at : package.json has this item : -----------------------------

 "@angular/router-deprecated": "^2.0.0-rc.2",



 -----------------
 http://stackoverflow.com/questions/37619103/router-outlet-not-working-without-a-routerlink-on-the-main-template

 As Gunter said, this is a known bug with the current RC (here's one of several issues on it: https://github.com/angular/angular-cli/issues/989). The approach that the angular tutorial and many others are taking right now is to use @angular/router-deprecated. Starting from just after ng new myproj and ng g route user, you'll need to do the following:

 npm install --save @angular/router-deprecated
 In src/system-config.ts, change @angular/router to @angular/router-deprecated in the barrels array.
 In src//app/myproj.component.ts, change:
 Routes to RouteConfig in the import line
 '@angular/router' to '@angular/router-deprecated' in the import line
 @Routes to @RouteConfig for the decorator
 Add the property name: 'User' to the RouteConfig object for /user
 Also, note that for links in the pre-RC router you do <a [routerLink]="['User']">User Info</a> (i.e. reference the name rather than the path).



 */
