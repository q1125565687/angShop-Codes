import { Injectable }           from '@angular/core';
import { Goods, Category }      from '../../data/defineClass';

import { Http, Response, Headers } from '@angular/http';
import { Observable }     from 'rxjs/Observable';

@Injectable()
export class AdminService {

  private headers = new Headers({'Content-Type': 'application/json'});

  private goodsUrl  = 'app/goods';  // URL to web api ,  web api   in Memory
  private categoryUrl  = 'app/categraies';  // URL to web api ,  web api   in Memory

  constructor(private http: Http ) {

  }


  getGoods(): Promise<Goods[]> {
    return this.http.get(this.goodsUrl)
        .toPromise()
        .then(response => response.json().data as Goods[])
        .catch(this.handleError);
  }


  private handleError(error: any) {

    // In a real world app, we might use a remote logging infrastructure
    // We'd also dig deeper into the error to get a better message

    let errMsg = (error.message) ? error.message :

        error.status ? `${error.status} - ${error.statusText}` : 'Server error';

    console.error(errMsg); // log to console instead

    return Observable.throw(errMsg);
  }


  getCategory(): Promise<Category[]> {

    return this.http.get(this.categoryUrl)
        .toPromise()
        .then(response => response.json().data as Category[])
        .catch(this.handleError);
  }


  deleteOneItem(item: Category): Promise<void> {

    console.log("delete item +++++++ ");
    console.log(item);

    const url = `${this.categoryUrl}/${item.id}`;
    return this.http.delete(url, {headers: this.headers})
        .toPromise()
        .then(() => null)
        .catch(this.handleError);
  }


  updateOneItem(item: Category): Promise<Category> {

    console.log("update ------- ");
    console.log(item);

    const url = `${this.categoryUrl}/${item.id}`;
    return this.http
        .put(url, JSON.stringify(item), {headers: this.headers})
        .toPromise()
        .then(() => item)
        .catch(this.handleError);
  }

  createOneItem(item: Category): Promise<Category> {

    console.log("creat item +++++++ ");
    console.log(item);

    return this.http
        .post(this.categoryUrl, JSON.stringify(item), {headers: this.headers})
        .toPromise()
        .then(res => res.json().data)
        .catch(this.handleError);
  }


  // ------------------------------------------------ For Goods

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



  updateOneGoods(item: Goods): Promise<Goods> {

    console.log("update Goods ------- ");
    console.log(item);

    const url = `${this.goodsUrl}/${item.id}`;
    return this.http
        .put(url, JSON.stringify(item), {headers: this.headers})
        .toPromise()
        .then(() => item)
        .catch(this.handleError);
  }


  createOneNewGoods(item: Goods): Promise<Goods> {

    console.log("creat new Goods +++++++ ");
    console.log(item);

    return this.http
        .post(this.goodsUrl, JSON.stringify(item), {headers: this.headers})
        .toPromise()
        .then(res => res.json().data)
        .catch(this.handleError);
  }


  getAllGoods(): Promise<Goods[]> {

    return this.http.get(this.goodsUrl)
        .toPromise()
        .then(response => response.json().data as Goods[])
        .catch(this.handleError);
  }

}
