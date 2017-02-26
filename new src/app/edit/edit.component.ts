/*
import { Component, OnInit } from '@angular/core';

@Component({
  selector: 'app-edit',
  templateUrl: './edit.component.html',
  styleUrls: ['./edit.component.css']
})
export class EditComponent implements OnInit {

  constructor() { }

  ngOnInit() {
  }

}

*/


import { Component, OnInit }  from '@angular/core';
import { Hero }               from '../data/defineClass';
import { Goods, Category }        from '../data/defineClass';
import { AdminService }           from '../back/services/admin.service';


@Component({
  //moduleId: module.id,
  selector: 'app-edit',
  templateUrl: './edit.component.html',
  styleUrls: ['./edit.component.css']
})


export class EditComponent implements OnInit {

  private categories: Array<Category>;
  private subCategories: Array<Category>;

  powers = ['Really Smart', 'Super Flexible',
    'Super Hot', 'Weather Changer'];


  //model = new Hero(18, 'Dr IQ', this.powers[0], 'Chuck Overstreet');

  //{ id: 13, cat_id: 13, parent_id: 1, cat_name: 'HUAWEI', intro: 'HUAWEI'},

  model = new Category( 13, 13, 1, 'HUAWEI', 'HUAWEI');


  submitted = false;

  constructor(private adminService: AdminService)
  { }

  ngOnInit() {

    this.getCategory();

  }

  private getCategory(): Promise<Category[]> {

    return this.adminService.getCategory()
        .then(categories => this.categories = categories)
        //.then(categories => this.subCategories = categories)
        .then(() => {
          this.subCategories = this.categories.filter(h => h.parent_id == 0)})
  }



  onSubmit() {


    this.submitted = true;

    console.log(this.model);


    alert("Submit");
  }



  // TODO: Remove this when we're done
  get diagnostic() { return JSON.stringify(this.model); }

}




/*
 Bootstrap ----------------------------- : 2016-12-28 , not install this : npm install bootstrap --save , may be should install ??

 https://angular.io/docs/ts/latest/guide/forms.html


 Let's add the stylesheet.

 Open a terminal window in the application root folder and enter the command:
 COPY CODE
 npm install bootstrap --save
 Open index.html and add the following link to the <head>.
 COPY CODE
 <link rel="stylesheet"
 href="https://unpkg.com/bootstrap@3.3.7/dist/css/bootstrap.min.css">


 */


