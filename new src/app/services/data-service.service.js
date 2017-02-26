"use strict";
var __decorate = (this && this.__decorate) || function (decorators, target, key, desc) {
    var c = arguments.length, r = c < 3 ? target : desc === null ? desc = Object.getOwnPropertyDescriptor(target, key) : desc, d;
    if (typeof Reflect === "object" && typeof Reflect.decorate === "function") r = Reflect.decorate(decorators, target, key, desc);
    else for (var i = decorators.length - 1; i >= 0; i--) if (d = decorators[i]) r = (c < 3 ? d(r) : c > 3 ? d(target, key, r) : d(target, key)) || r;
    return c > 3 && r && Object.defineProperty(target, key, r), r;
};
var core_1 = require('@angular/core');
var http_1 = require('@angular/http');
var Observable_1 = require('rxjs/Observable');
require('rxjs/add/operator/map');
require('rxjs/add/operator/catch');
require('rxjs/add/operator/toPromise');
var defineClass_1 = require('./../data/defineClass');
//当 TypeScript 看到@Injectable()装饰器时，就会记下本服务的元数据。
//如果 Angular 需要往这个服务中注入其它依赖，就会使用这些元数据。
//此时，HeroService还没有任何依赖，但我们还是得加上这个装饰器。
// 作为一项最佳实践，无论是出于提高统一性还是减少变更的目的， 都应该从一开始就加上@Injectable()装饰器。
var DataService = (function () {
    function DataService(http) {
        this.http = http;
        this.headers = new http_1.Headers({ 'Content-Type': 'application/json' });
        this.dataUrl = './app/data/test.json'; // URL to web API
        this.teachers = [
            { id: 1, name: 'Pat McGee', age: '30', picture: '10 KG', courseID: 6 },
            { id: 2, name: 'Jason Harrison', age: '40', picture: '10 KG', courseID: 6 },
            { id: 3, name: 'John Bowyer-Smyth', age: '30', picture: '10 KG', courseID: 6 },
            { id: 4, name: 'Paul Mills', age: '50', picture: '10 KG', courseID: 6 },
            { id: 5, name: 'Jeff Parker', age: '30', picture: 'McCain', courseID: 8 }
        ];
    }
    // Local Array data
    DataService.prototype.getTeachersFromLocal = function () {
        return this.teachers;
    };
    // Get One person's information
    DataService.prototype.getOneFromLocal = function (id) {
        console.log("getOneFromLocal id = " + id);
        for (var _i = 0, _a = this.teachers; _i < _a.length; _i++) {
            var item = _a[_i];
            if (item.id == id) {
                return item;
            }
        }
        return null;
    };
    // Get One person's information
    DataService.prototype.addOneToLocal = function (t) {
        var i = this.teachers.length;
        this.teachers[i] = t;
    };
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
    DataService.prototype.getTeacherByPromise = function () {
        return Promise.resolve(this.teachers);
    };
    // Json file data
    DataService.prototype.getJsonDataByService = function () {
        return this.http.get(this.dataUrl)
            .map(this.extractData)
            .catch(this.handleError);
    };
    DataService.prototype.extractData = function (res) {
        var body = res.json();
        return body || {};
    };
    DataService.prototype.handleError = function (error) {
        // In a real world app, we might use a remote logging infrastructure
        // We'd also dig deeper into the error to get a better message
        var errMsg = (error.message) ? error.message :
            error.status ? error.status + " - " + error.statusText : 'Server error';
        console.error(errMsg); // log to console instead
        return Observable_1.Observable.throw(errMsg);
    };
    DataService.prototype.getTeacherByID = function (id) {
        return this.getTeacherByPromise()
            .then(function (teachers) { return teachers.find(function (teacher) { return teacher.id === id; }); });
    };
    // Has problem ???
    DataService.prototype.update = function (teacher) {
        console.log(teacher);
        var url = this.dataUrl + "/" + teacher.id;
        console.log(url); // log to console instead
        return this.http
            .put(url, JSON.stringify(teacher), { headers: this.headers })
            .toPromise()
            .then(function () { return teacher; })
            .catch(this.handleError);
    };
    // Has problem ???
    DataService.prototype.updateLocal = function (teacher) {
        console.log(teacher);
        for (var i = 0; i < this.teachers.length; i++) {
            if (this.teachers[i].id == teacher.id) {
                this.teachers[i] = teacher;
                return;
            }
        }
    };
    DataService.prototype.delete = function (id) {
        var url = this.dataUrl + "/" + id;
        return this.http.delete(url, { headers: this.headers })
            .toPromise()
            .then(function () { return null; })
            .catch(this.handleError);
    };
    DataService.prototype.create = function (name) {
        return this.http
            .post(this.dataUrl, JSON.stringify({ name: name }), { headers: this.headers })
            .toPromise()
            .then(function (res) { return res.json().data; })
            .catch(this.handleError);
    };
    DataService.prototype.createLocal = function (name) {
        if (this.teachers.length <= 0)
            return null;
        var teacher = new defineClass_1.Teacher();
        var oldT = this.teachers[this.teachers.length - 1];
        teacher.id = oldT.id + 1;
        teacher.name = name;
        teacher.age = oldT.age;
        teacher.picture = oldT.picture;
        teacher.courseID = oldT.courseID;
        console.log(teacher);
        this.teachers.push(teacher);
        return teacher;
    };
    DataService.prototype.search = function (term) {
        return this.teachers[0];
    };
    DataService = __decorate([
        core_1.Injectable()
    ], DataService);
    return DataService;
}());
exports.DataService = DataService;
