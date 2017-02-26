import { Injectable }               from '@angular/core';
import { Http, Response, Headers }  from '@angular/http';
import { Observable }               from 'rxjs/Observable';
import { OrdInfo, OrdGoods }        from '../data/defineClass';


@Injectable()
export class OrderService {

  private headers = new Headers({'Content-Type': 'application/json'});
  private ordInforUrl  = 'app/ordInforItems';    // URL to web api ,  web api   in Memory
  private ordGoodsUrl  = 'app/ordGoodsItems';    // URL to web api ,  web api   in Memory


  constructor(private http: Http ) {
  }

  getOrdInforItems(): Promise<OrdInfo[]> {

    return this.http.get(this.ordInforUrl)
        .toPromise()
        .then(response => response.json().data as OrdInfo[])
        .catch(this.handleError);
  }

  getOrdGoodsItems(): Promise<OrdGoods[]> {

    return this.http.get(this.ordGoodsUrl)
        .toPromise()
        .then(response => response.json().data as OrdGoods[])
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

  create_OrdInforItem(item: OrdInfo): Promise<OrdInfo> {

    return this.http
        .post(this.ordInforUrl, JSON.stringify(item), {headers: this.headers})
        .toPromise()
        .then(res => res.json().data)
        .catch(this.handleError);
  }

  create_OrdGoodsItem(item: OrdGoods): Promise<OrdGoods> {

    return this.http
        .post(this.ordGoodsUrl, JSON.stringify(item), {headers: this.headers})
        .toPromise()
        .then(res => res.json().data)
        .catch(this.handleError);
  }


}
