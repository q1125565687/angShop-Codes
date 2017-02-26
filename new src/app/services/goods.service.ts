import { Injectable }           from '@angular/core';
import { Goods, Category }      from '../data/defineClass';

import { Http, Response, Headers } from '@angular/http';
import { Observable }     from 'rxjs/Observable';


@Injectable()
export class GoodsService {

  //private headers = new Headers({'Content-Type': 'application/json'});

  private goodsUrl  = 'app/goods';  // URL to web api ,  web api   in Memory
  private categoryUrl  = 'app/categraies';  // URL to web api ,  web api   in Memory

  //public goods: Array<Goods>;

  private paramsID_homeMenu : number;
  private paramsID_typeTab  : number;

  constructor(private http: Http ) {

  }


  getGoods(): Promise<Goods[]> {
          return this.http.get(this.goodsUrl)
        .toPromise()
        .then(response => response.json().data as Goods[])
        .catch(this.handleError);
  }


  getGoodsByID(cat_id: number): Promise<Goods[]> {

    //console.log("cat_id = " + cat_id);

    //this.paramsID = cat_id;

    return this.getGoods()
        .then(goodsOne => goodsOne.filter(good => good.cat_id === cat_id));
  }


  getOneGoodsByID(goods_id: number): Promise<Goods[]> {

    console.log("goods_id = " + goods_id);

    return this.getGoods()
        .then(goodsOne => goodsOne.filter(good => good.goods_id === goods_id));
  }


  private handleError(error: any) {

    // In a real world app, we might use a remote logging infrastructure
    // We'd also dig deeper into the error to get a better message

    let errMsg = (error.message) ? error.message :

        error.status ? `${error.status} - ${error.statusText}` : 'Server error';

    console.error(errMsg); // log to console instead

    return Observable.throw(errMsg);
  }

  getCategoryFromHome(cat_id: number): Promise<Category[]> {

    console.log("cat_id = " + cat_id);

    this.paramsID_homeMenu = cat_id;

    return this.http.get(this.categoryUrl)
        .toPromise()
        .then(response => response.json().data as Category[])
        .catch(this.handleError);
  }


  getCategoryFromType(cat_id: number): Promise<Category[]> {

    console.log("At From Type cat_id = " + cat_id);

    this.paramsID_typeTab = cat_id;

    return this.http.get(this.categoryUrl)
        .toPromise()
        .then(response => response.json().data as Category[])
        .catch(this.handleError);
  }


  getCategory(): Promise<Category[]> {

    return this.http.get(this.categoryUrl)
        .toPromise()
        .then(response => response.json().data as Category[])
        .catch(this.handleError);
  }


  // Because can not get it directly !!!!
  getParamsID_FromHome() {

    return this.paramsID_homeMenu;
  }

  // Because can not get it directly !!!!
  getParamsID_FromType() {

    return this.paramsID_typeTab;
  }


  getMenu(): Promise<Category[]> {

    return this.getCategory();
      //  .then(goodsOne => goodsOne.filter(good => good.parent_id == 0));

  }

}
