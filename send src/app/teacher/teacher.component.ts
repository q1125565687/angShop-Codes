import { Component, OnInit, AfterContentInit } from '@angular/core';
import { ActivatedRoute, Params, Router }   from '@angular/router';
import { Goods }    from '../data/defineClass';
import { GoodsService }         from '../services/goods.service';
import { Location }             from '@angular/common';

@Component({
    selector: 'app-teacher',

    templateUrl:'../teacher/teacher.component.html',
    styleUrls: ['../teacher/teacher.component.css'],
})


export class TeacherComponent implements AfterContentInit {


    private goodsArray: Array<any>;
    //private selectedTeacher: Goods;
    private selectedHero: Goods;

    // For : route.params.subscribe(params => {}
    private sub: any;
    private parameterText: string;   // Come from Url

    constructor(
                private goodsService: GoodsService,
                private location: Location,
                private route: ActivatedRoute
    ) {}

    //实现了 Angular 的 ngOnInit 生命周期钩子，Angular 就会主动调用这个钩子。
    // Angular提供了一些接口，用来介入组件生命周期的几个关键时间点：刚创建时、每次变化时，以及最终被销毁时。
    // For debug ngOnInit() {
    //     let x = 5;
    // }
    ngAfterContentInit() {

        this.sub = this.route.params.subscribe(params => {
            this.parameterText = params['search_Text']; // (+) converts string 'id' to a number
        });

        console.log("init : get Param , search_Text =   " + this.parameterText);

        //this.getInstructors();

        // !!!!  ****   Use HTTP Remote , can not access data too early
        // Because they has not gotten ,!!!
        // this.showTeachers("In init first get data");

        // Just GeT all Smart Phones : cat_id = 1;  and their parent_id: 0
        this.goodsService
            .getGoods()
            .then(goods => this.goodsArray = goods.filter(good => good.goods_name.toLowerCase().includes(this.parameterText.toLowerCase())));
            //.then(goods => this.goodsArray = goods.filter(good => good.goods_name.includes("iPhone")));
    }

    onSelect(hero: Goods): void {
        this.selectedHero = hero;
    }

    goBack(): void {
        this.location.back();
    }

    delete(goods: Goods): void {

        console.log("Will delete id : " + goods.goods_id);

        /*  Test ??
        let ts = [];
        let n  = 0;

        for(let i = 0; i<this.goodsArray.length; i++ ) {

            let t = new Goods();

            t =  this.goodsArray[i];

            if (t.goods_id != goods.goods_id) {
                ts[n++] = t;
            }
        }

        this.goodsArray = ts;
        */
        //this.showTeachers("Delete ....");
    }
}


/*

import { Component, OnInit, AfterContentInit } from '@angular/core';
import { ActivatedRoute, Params, Router }   from '@angular/router';

import { Goods }  from '../defineClass';

import { DataService }          from '../services/data-service.service';
import { GoodsService }         from '../services/goods.service';


@Component({
    //???
    //moduleId: module.id,
    selector: 'app-teacher',
    templateUrl:'../teacher/teacher.component.html',
    styleUrls: ['../teacher/teacher.component.css'],

})


export class TeacherComponent implements AfterContentInit {

    public title = 'This is Teacher Component !';

    private goodsArray: Array<any>;

    private selectedTeacher: Goods;

    // For : route.params.subscribe(params => {}
    private sub: any;
    private parameterText: string;   // Come from Url

    constructor(private dataService: DataService,
                private goodsService: GoodsService,
                private router: Router,
                private route: ActivatedRoute
    ) {

    }

    //实现了 Angular 的 ngOnInit 生命周期钩子，Angular 就会主动调用这个钩子。
    // Angular提供了一些接口，用来介入组件生命周期的几个关键时间点：刚创建时、每次变化时，以及最终被销毁时。

    //ngOnInit(): void {
    ngAfterContentInit() {

        this.sub = this.route.params.subscribe(params => {
            this.parameterText = params['search_Text']; // (+) converts string 'id' to a number
        });

        console.log("init : get Param , search_Text =   " + this.parameterText);


        //this.getInstructors();

        // !!!!  ****   Use HTTP Remote , can not access data too early
        // Because they has not gotten ,!!!
        // this.showTeachers("In init first get data");


        // Just GeT all Smart Phones : cat_id = 1;  and their parent_id: 0
        this.goodsService
            .getGoods()
            .then(goods => this.goodsArray = goods.filter(good => good.goods_name.includes(this.parameterText)));

    }

*/


    // Get data from service from json file
    /*
    getJsonData() {
        this.dataService.getJsonDataByService()
            // Subscribe to changes in the observable object
            // that is returned by getRemoteData.
            .subscribe(
                // You basically get three handlers.
                // 1. Handle successful data.
                data => {
                    this.teachers = data;
                    console.log("From getJsonData : " + JSON.stringify(data));
                },
                // 2. Handle error.
                error => {
                    alert(error);
                },
                // 3. Execute final instructions when successful.
                () => {
                    console.log('Finished');
                });
    }


    go_Detail(): void {
        console.log("router.navigate : /detail/detail : " + this.selectedTeacher.id);
        this.router.navigate(['/detail/detail', this.selectedTeacher.id]);
    }

*/


    /*

    // After Click,  selectedTeacher != null, so show teacher detail
    onSelect(goods: Goods): void {

        console.log(goods );

        this.selectedTeacher = goods;

        //console.log(document.getElementsByTagName("app-detail"));
    }

*/

    /*
    add(name: string): void {
        name = name.trim();
        if (!name) { return; }

        console.log("Will add name : " + name);

        //let teacher = this.createLocal(name);

        this.selectedTeacher = null;

        //this.showTeachers("Add ....");

        this.addToWeb(name);  // For Json file
    }


    addToWeb(name: string): void {
        name = name.trim();
        if (!name) { return; }

        this.dataService.create(name)
            .then(teacher => {
                this.teachers.push(teacher);
                this.selectedTeacher = null;
            });
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


    delete(teacher: Teacher): void {

        console.log("Will delete id : " + teacher.id);

        let ts = [];
        let n  = 0;

        for(let i = 0; i<this.teachers.length; i++ ) {

            let t = new Teacher();

             t =  this.teachers[i];

            if (t.id != teacher.id) {
                ts[n++] = t;
            }
        }

        this.teachers = ts;

        this.showTeachers("Delete ....");
    }


    deleteToWeb(teacher: Teacher): void {
        this.dataService
            .delete(teacher.id)
            .then(() => {
                this.teachers = this.teachers.filter(h => h !== teacher);
                if (this.selectedTeacher === teacher) { this.selectedTeacher = null; }
            });
    }


    showTeachers(msg : string) {

        console.log(msg + "Teachers[] length :  " + this.teachers.length);

        for (let item of this.teachers) {

            console.log("ID : " + item.id);
            console.log("Name : " + item.name);
        }
    }

}
*/
