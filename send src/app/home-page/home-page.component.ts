import { Component, OnInit, AfterContentInit } from '@angular/core';
import { GoodsService } from '../services/goods.service';
import { ActivatedRoute, Params }   from '@angular/router';


@Component({
  selector: 'app-home-page',
  templateUrl: './home-page.component.html',
  styleUrls: ['./home-page.component.css']
})

//export class HomePageComponent implements OnInit {

export class HomePageComponent implements AfterContentInit {

  private goodsArray: Array<any>;
  private categories: Array<any>;

  private parameterMenu : number;   // Come from Url

  private tabUrl_ID : Array<any>;

  private tabUrl_ID_1 : number;
  private tabUrl_ID_2 : number;
  private tabUrl_ID_3 : number;

  private tabUrl_Name_1 : string;
  private tabUrl_Name_2 : string;
  private tabUrl_Name_3 : string;


  constructor(
      private goodsService: GoodsService,
      private route: ActivatedRoute,
  ) {}

  ngOnInit(): void {

    /*
    console.log("init : tParam come in  " + this.route.params['cat_id']);


    // More time for get getParamsID() from service ;
    this.route.params
        .switchMap((params: Params) => this.goodsService.getCategoryFromHome(+params['cat_id']))
        .subscribe(categories => this.categories = categories);

    this.parameterMenu = this.goodsService.getParamsID_FromHome();

    this.getGoods();

    */

  }

  ngAfterContentInit() {

    console.log("init : tParam come in  " + this.route.params['cat_id']);


    // More time for get getParamsID() from service ;
    this.route.params
        .switchMap((params: Params) => this.goodsService.getCategoryFromHome(+params['cat_id']))
        .subscribe(categories => this.categories = categories);

    this.parameterMenu = this.goodsService.getParamsID_FromHome();

    this.getGoods();


    document.getElementById("hh").innerHTML = " parameterMenu = " + this.parameterMenu;

  }


  // Get Data from Web Api of Memory
  getGoods(): void {

    switch (this.parameterMenu) {

      case 1:


        // Just GeT all Smart Phones : cat_id = 1;  and their parent_id: 0
        this.goodsService
            .getGoods()
            .then(goods => this.goodsArray = goods.filter(good => ((good.cat_id === 11) ||
            (good.cat_id === 12) ||
            (good.cat_id === 13))));

/*
        this.tabUrl_ID.push({id : 11, name : "iPhone"});
        this.tabUrl_ID.push({id : 12, name : "Samsung"});
        this.tabUrl_ID.push({id : 13, name : "HUAWEI"});
        */

          this.tabUrl_ID_1 = 11;
          this.tabUrl_ID_2 = 12;
          this.tabUrl_ID_3 = 13;

        this.tabUrl_Name_1 = "iPhone";
        this.tabUrl_Name_2 = "Samsung";
        this.tabUrl_Name_3 = "HUAWEI";

        document.getElementById("menu0").className = "active";

        break;

      case 2:


        // Just GeT all Smart Phones : cat_id = 2;  and their parent_id: 0
        this.goodsService
            .getGoods()
            .then(goods => this.goodsArray = goods.filter(good => ((good.cat_id === 21) ||
            (good.cat_id === 22) ||
            (good.cat_id === 23))));

        /*

        this.tabUrl_ID.push({id : 21, name : "Lenovo"});
        this.tabUrl_ID.push({id : 22, name : "Dell"});
        this.tabUrl_ID.push({id : 23, name : "HP"});
        */


        this.tabUrl_ID_1 = 21;
        this.tabUrl_ID_2 = 22;
        this.tabUrl_ID_3 = 23;

        this.tabUrl_Name_1 = "Lenovo";
        this.tabUrl_Name_2 = "Dell";
        this.tabUrl_Name_3 = "HP";

        document.getElementById("menu1").className = "active";
        break;

      case 3:


        // Just GeT all Smart Phones : cat_id = 3;  and their parent_id: 0
        this.goodsService
            .getGoods()
            .then(goods => this.goodsArray = goods.filter(good => ((good.cat_id === 31) ||
            (good.cat_id === 32) ||
            (good.cat_id === 33))));

        /*
        this.tabUrl_ID.push({id : 31, name : "Hisense"});
        this.tabUrl_ID.push({id : 32, name : "Samsung"});
        this.tabUrl_ID.push({id : 33, name : "LG "});
        */

        this.tabUrl_ID_1 = 31;
        this.tabUrl_ID_2 = 32;
        this.tabUrl_ID_3 = 33;

        this.tabUrl_Name_1 = "Hisense";
        this.tabUrl_Name_2 = "Samsung";
        this.tabUrl_Name_3 = "LG";

        document.getElementById("menu2").className = "active";

        break;
    }
  }



  showGoods(msg : string) {

    console.log(msg + "Goods[] length :  " + this.goodsArray.length);

    for (let item of this.goodsArray) {

      console.log("goods_id : " + item.goods_id);
      console.log("goods_sn : " + item.goods_sn);
      console.log("cat_id : " + item.cat_id);
      console.log("brand_id : " + item.brand_id);
      console.log("goods_name : " + item.goods_name);
      console.log("goods_sn : " + item.goods_sn);
    }
  }
}

