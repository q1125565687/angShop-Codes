import { Component, OnInit }      from '@angular/core';
import { ActivatedRoute }         from '@angular/router';
import { Location }               from '@angular/common';
import { AdminService }           from '../services/admin.service';
import { Goods, Category }        from '../../data/defineClass';
//import { RouteParams, Router }    from '@angular/router-deprecated';
//import { FormGroup, FormBuilder, FormControl, Validators } from '@angular/forms';
//import {forEach} from "@angular/router/src/utils/collection";

@Component({
  selector: 'app-admin',
  templateUrl: './admin.component.html',
  styleUrls: ['./admin.component.css']
})

export class AdminComponent implements OnInit {
  private goodsArray: Array<Goods>;
  private categories: Array<Category>;


  private editItem: Category;

  private id: number;
  private sub: any;

  private subTitle : string;
  private adminType;


  // ----------------------------- For Edit Form

  private subCat_OneGrageItems: Array<Category>;     // For select options, when add new two grade category item

  //model = new Category( 13, 13, 1, 'HUAWEI', 'HUAWEI');

  submitted = false;

  constructor(private adminService: AdminService,
              private route: ActivatedRoute,
              private location: Location
  ) {}

  ngOnInit() {

    this.sub = this.route.params.subscribe(params => {
      this.id = +params['id']; // (+) converts string 'id' to a number

      // In a real app: dispatch action to load the details here.
    });

    // ?? ?? let id = this.routeParams.get('id');

    console.log(this.id);

    this.getCategoryAddRoot();

  }

  ngOnDestroy() {
    this.sub.unsubscribe();
  }

  /*
  private getCategory(): Promise<Category[]> {

    return this.adminService.getCategory()
        .then(categories => this.categories = categories);
  }
*/

  // delete to in-memory-data
  private deleteOne(item: Category): void {
    this.adminService
        .deleteOneItem(item)
        .then(() => {
          this.categories = this.categories.filter(h => h !== item);
        });
  }


  //
  private addOne(): void {

    this.editItem = new Category( 1, 1, 1, 'Category Name', 'Description');

    this.subTitle = "Add Category";
    this.adminType = 1;

    console.log("Add a new one Category ====== ");

  }

  // delete
  private editOne(item: Category): void {

    this.editItem = item;

    this.subTitle = "Edit Category";
    this.adminType = 3;

    console.log("Edit a new one Category ====== ");

  }


  private startSearch() : void {

    //let link = ['/teacher/teacher', this.myForm.value.searchText];

    console.log("addd item ...... ");

    alert("Add Form");

    //this.router.navigate(link);
  }

// ------------------------------------------- For edit Form :

  private getCategory(): Promise<Category[]> {

    return this.adminService.getCategory()
        .then(categories => this.categories = categories)
        //.then(categories => this.subCategories = categories)
        .then(() => {
            this.subCat_OneGrageItems = this.categories.filter(h => h.parent_id == 0)
        })
  }

  private getCategoryAddRoot(): Promise<Category[]> {

    // Add Root Level ---> select option item
    let root = new Category( 0, 0, 0, 'Root Category', 'Root Category');

    return this.getCategory()
        .then(() => {
          this.subCat_OneGrageItems.push(root)
        })
  }


  private onSubmit() {

    //console.log("After submit ---  this.editItem" );
    //console.log(this.editItem);

    if( this.adminType == 3 ){

      this.adminService.updateOneItem(this.editItem);

    }

    if( this.adminType == 1 ){

      this.getNewCatIDandSave();
    }

    this.submitted = true;
    this.editItem = null;
  }


  // For get new Category's ID
  private getNewCatIDandSave(){

    let newID = 0;

    // Why it could not find ? why changed ?
    if(!isNaN(this.editItem.parent_id))
      this.editItem.parent_id = Number(this.editItem.parent_id);

    // For Add, new One
    let newItem = new Category(0, 0, this.editItem.parent_id,
        this.editItem.cat_name,
        this.editItem.intro);



    for(let i=0; i<this.categories.length; i++) {

      if (this.categories[i].parent_id === this.editItem.parent_id) {

        if (this.categories[i].cat_id > newID) {

          newID = this.categories[i].cat_id;
        }
      }
    }

    if( newID === 0 ){
      // This item is the first one of this category !!!
      newID = this.editItem.parent_id * 10;               // parent ID type 4 => 40
    }

    newItem.cat_id = newID + 1;
    newItem.id     = newID + 1;

    //console.log("will save ---- this.editItem" );
    console.log(newItem);

    this.categories.unshift(newItem);

    if( newItem.parent_id === 0 ){
      // Because : New Add a one Level Category, and push in : this.subCategories, for select options using
      this.subCat_OneGrageItems.push(newItem);
    }

    this.adminService.createOneItem(newItem);

  }

  goBack(): void {
    this.location.back();
  }

  // TODO: Remove this when we're done
  //get diagnostic() { return JSON.stringify(this.editItem); }

}


