import { Injectable } from '@angular/core';


import { Http, Response, Headers } from '@angular/http';
import { Observable }     from 'rxjs/Observable';


import 'rxjs/add/operator/map';
import 'rxjs/add/operator/catch';
import 'rxjs/add/operator/toPromise';

import { Teacher, Hero }  from '../data/defineClass';
import {forEach} from "@angular/router/src/utils/collection";


//当 TypeScript 看到@Injectable()装饰器时，就会记下本服务的元数据。
//如果 Angular 需要往这个服务中注入其它依赖，就会使用这些元数据。

//此时，HeroService还没有任何依赖，但我们还是得加上这个装饰器。
// 作为一项最佳实践，无论是出于提高统一性还是减少变更的目的， 都应该从一开始就加上@Injectable()装饰器。

@Injectable()
export class DataService {

  private headers = new Headers({'Content-Type': 'application/json'});

  //private dataUrl = './app/data/test.json';  // URL to json file

  private dataUrl = './app/instructors';

  private heroesUrl = 'app/instructors';  // URL to web api ,  web api   in Memory

  public teachers: Array<Teacher>;

  constructor(private http: Http ) {

    /*
    this.teachers = [
      { id: 1, name: 'Pat McGee', age: '30', picture: '10 KG', courseID: 6 },
      { id: 2, name: 'Jason Harrison', age: '40', picture: '10 KG', courseID: 6 },
      { id: 3, name: 'John Bowyer-Smyth', age: '30', picture: '10 KG', courseID: 6 },
      { id: 4, name: 'Paul Mills', age: '50', picture: '10 KG', courseID: 6 },
      { id: 5, name: 'Jeff Parker',  age: '30', picture: 'McCain',  courseID: 8 }
    ];
    */
  }

  // Local Array data
  getTeachersFromLocal()
  {

    return this.teachers;
  }

  // Get One person's information
  getOneFromLocal(id: number)
  {

    console.log("getOneFromLocal id = " + id);

    for(let item of this.teachers ){

      if( item.id == id ) {

        return item;
      }
    }
    return null;
  }


  // Get One person's information
  addOneToLocal( t : Teacher ) {

    let i = this.teachers.length;

    this.teachers[i] = t;

  }


// Standard Way :
/*
  getTeachers(): Promise<Teacher[]> {
    return this.http.get(this.heroesUrl)
        .toPromise()
        .then(response => response.json().data as Teacher[])
        .catch(this.handleError);
  }

  getHero(id: number): Promise<Teacher> {
    return this.getTeachers()
        .then(teachers => teachers.find(teacher => teacher.id === id));
  }
*/

  // Promise Version :
  getTeacherByPromise(): Promise<Teacher[]> {
    return Promise.resolve(this.teachers);
  }


  // Json file data  *******
  getJsonDataByService(): Observable<string[]> {

    return this.http.get(this.dataUrl)
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

  getTeacherByID(id: number): Promise<Teacher> {

    return this.getTeacherByPromise()

        .then(teachers => teachers.find(teacher => teacher.id === id));
  }

  // Has problem ???
  updateLocal(teacher: Teacher) {

    console.log(teacher);

    for(let i = 0; i<this.teachers.length; i++ ) {

      if (this.teachers[i].id == teacher.id) {
        this.teachers[i] = teacher;
        return;
      }
    }
  }


  delete(id: number): Promise<void> {
    const url = `${this.dataUrl}/${id}`;
    return this.http.delete(url, {headers: this.headers})
        .toPromise()
        .then(() => null)
        .catch(this.handleError);
  }

  create(name: string): Promise<Teacher> {

    let teacher = new Teacher();
    let oldT = this.teachers[this.teachers.length - 1];

    teacher.id = oldT.id + 1;
    teacher.name = name;
    teacher.age = oldT.age;
    teacher.picture = oldT.picture;
    teacher.courseID = oldT.courseID;

    return this.http
        .post(this.dataUrl, JSON.stringify({name: name}), {headers: this.headers})
        .toPromise()
        .then(res => res.json().data)
        .catch(this.handleError);
  }


  createLocal(name: string) {

    if( this.teachers.length <= 0 )
      return null;

    let teacher = new Teacher();
    let oldT = this.teachers[this.teachers.length - 1];

    teacher.id = oldT.id + 1;
    teacher.name = name;
    teacher.age = oldT.age;
    teacher.picture = oldT.picture;
    teacher.courseID = oldT.courseID;

    console.log(teacher);

    this.teachers.push(teacher);

    return teacher;

  }

  search(term: string) {

    return this.teachers[0];
  }



// ----------From   Web Api Access Data  : toPromise -------------------------------------------

  updateFromWebApi(teacher: Teacher): Promise<Hero> {
    const url = `${this.heroesUrl}/${teacher.id}`;
    return this.http
        .put(url, JSON.stringify(teacher), {headers: this.headers})
        .toPromise()
        .then(() => teacher)
        .catch(this.handleError);
  }


  getHeroesFromWebApi(): Promise<Teacher[]> {
    return this.http.get(this.heroesUrl)
        .toPromise()
        .then(response => response.json().data as Teacher[])
        .catch(this.handleError);
  }

  getHeroFromWebApi(id: number): Promise<Teacher> {
    return this.getHeroesFromWebApi()
        .then(teachers => teachers.find(teacher => teacher.id === id));
  }

  deleteFromWebApi(id: number): Promise<void> {
    const url = `${this.heroesUrl}/${id}`;
    return this.http.delete(url, {headers: this.headers})
        .toPromise()
        .then(() => null)
        .catch(this.handleError);
  }

  createFromWebApi(name: string): Promise<Hero> {
    return this.http
        .post(this.heroesUrl, JSON.stringify({name: name}), {headers: this.headers})
        .toPromise()
        .then(res => res.json().data)
        .catch(this.handleError);
  }

}
