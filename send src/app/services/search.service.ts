import { Injectable }     from '@angular/core';
import { Http, Response } from '@angular/http';

import { Teacher }         from '../data/defineClass';
import { Observable } from 'rxjs';

import 'rxjs/add/operator/debounceTime';
import 'rxjs/add/operator/map';

@Injectable()
export class SearchService {

  constructor(private http: Http) {

  }


  search(term: string): Observable<Teacher[]> {
    return this.http
        .get(`app/instructors/?name=${term}`)
        .map((r: Response) => r.json().data as Teacher[]);
  }


  // Json file data
  searchForJsonFile(term: string): Observable<string[]> {

    console.log(term);

    return this.http
        .get(`./app/data/test.json?name=${term}`)
        //.get(this.dataUrl)    ?????? No filer ??
        .map(this.extractData)
        .catch(this.handleError);
  }


  private extractData(res: Response) {

    let body = res.json();

    return body || {};
  }

  private handleError(error: any) {

    // In a real world app, we might use a remote logging infrastructure
    // We'd also dig deeper into the error to get a better message

    let errMsg = (error.message) ? error.message :

        error.status ? `${error.status} - ${error.statusText}` : 'Server error';

    console.error(errMsg); // log to console instead

    return Observable.throw(errMsg);
  }
}


