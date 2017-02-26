import { Injectable } from '@angular/core';
import { CartItem }      from '../data/defineClass';

import { Http, Response, Headers } from '@angular/http';
import { Observable }     from 'rxjs/Observable';

@Injectable()
export class CartService {

  private headers = new Headers({'Content-Type': 'application/json'});
  //private goodsUrl  = 'app/goods';  // URL to web api ,  web api   in Memory
  private cartUrl  = 'app/cartItems';    // URL to web api ,  web api   in Memory


  constructor(private http: Http ) {
  }

  getCartItems(): Promise<CartItem[]> {

    return this.http.get(this.cartUrl)
        .toPromise()
        .then(response => response.json().data as CartItem[])
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


  createOneItem(item: CartItem): Promise<CartItem> {

    console.log("creat item +++++++ ");
    console.log(item);

    return this.http
        .post(this.cartUrl, JSON.stringify(item), {headers: this.headers})
        .toPromise()
        .then(res => res.json().data)
        .catch(this.handleError);
  }

  deleteOneItem(item: CartItem): Promise<void> {

    console.log("delete item +++++++ ");
    console.log(item);

    const url = `${this.cartUrl}/${item.id}`;
    return this.http.delete(url, {headers: this.headers})
        .toPromise()
        .then(() => null)
        .catch(this.handleError);
  }


  updateOneItem(item: CartItem): Promise<CartItem> {

    console.log("update ------- ");
    console.log(item);

    const url = `${this.cartUrl}/${item.id}`;
    return this.http
        .put(url, JSON.stringify(item), {headers: this.headers})
        .toPromise()
        .then(() => item)
        .catch(this.handleError);
  }


  deleteAllItems(): Promise<void> {

    const url = `${this.cartUrl}/$`;
    return this.http.delete(url, {headers: this.headers})
        .toPromise()
        .then(() => null)
        .catch(this.handleError);
  }




}




/*

 RxJS库

 RxJS ("Reactive Extensions" 的缩写) 是一个被 Angular 认可的第三方库， 它实现了异步可观察对象 (asynchronous observable) 模式。

 开发指南中的所有例子都安装了 RxJS 的 npm 包，而且都被system.js加载过了。 这是因为可观察对象在 Angular 应用中使用非常广泛。

 HTTP 客户端更需要它。经过一个关键步骤，我们才能让 RxJS 可观察对象可用。



 */
