import { Component, OnInit }      from '@angular/core';
import { ActivatedRoute, Router }         from '@angular/router';
import { Location }               from '@angular/common';
import { AdminService }           from '../services/admin.service';
import { Goods, Category }        from '../../data/defineClass';


@Component({
  selector: 'app-edit-goods',
  templateUrl: './edit-goods.component.html',
  styleUrls: ['./edit-goods.component.css']
})


export class EditGoodsComponent implements OnInit {
  private goodsArray: Array<Goods>;
  private subGoodsArray: Array<Goods>;

  private categories: Array<Category>;
  private subCategories: Array<Category>;     // For select

  private editItem: Goods;

  private id: number;
  private type: number;
  private sub: any;

  private adminType;

  //submitted = false;

  //fileuploadname : string;

  private addFlag:  boolean;
  private editFlag: boolean;
  private title:    string;

  constructor(private adminService: AdminService,
              private route: ActivatedRoute,
              private router: Router,
              private location: Location
  ) {}


  ngOnInit() {

    this.sub = this.route.params.subscribe(params => {
      this.id = +params['id']; // (+) converts string 'id' to a number
      this.type = +params['type']; // (+) converts string 'id' to a number

    });

    console.log("param id = " + this.id + " type = " + this.type);

    switch(this.type){

      case 1:

        // Add new one
        this.addFlag  = true;
        this.editFlag = false;
        this.title    = "Add Goods ";
        break;

      case 3:

        // Edit
        this.addFlag = false;
        this.editFlag = true;
        this.title    = "Edit Goods " + this.id;
        break;
    }

    this.getOneFromArray(this.id);

    this.getCategory();

    this.getAllGoods();

  }


  ngOnDestroy() {
    this.sub.unsubscribe();
  }


  getOneFromArray(id : number) : Promise<Goods> {

    return this.getOneItem(id)
        .then(() => {
          this.editItem = this.subGoodsArray[0];
    })
  }


  getOneItem(id: number) : Promise<Goods[]> {

    return this.adminService.getOneGoodsByID(id)
        .then(goods => this.subGoodsArray = goods);
  }


  private getCategory(): Promise<Category[]> {

    return this.adminService.getCategory()
        .then(categories => this.categories = categories)
        //.then(categories => this.subCategories = categories)
        .then(() => {
          this.subCategories = this.categories.filter(h => h.parent_id != 0)
        })
  }


  private onSubmit() {

    console.log("After submit ---  this.editItem" );
    console.log(this.editItem);


    if( this.editFlag ) {

      this.adminService.updateOneGoods(this.editItem);

    }

    if( this.addFlag ){

      this.getNewCatIDandSave();

    }

    this.router.navigate( ['goods/goods'] );

  }


  // For get new Category's ID
  private getNewCatIDandSave(){

    let newID = 0;

    // Passing select Option , cat_id changed to string, now change to number ?? Why changed ???
    this.editItem.cat_id = Number(this.editItem.cat_id);

    // For Add, new One
    let newItem = new Goods( 0, this.editItem.cat_id, 0, this.editItem.goods_sn, this.editItem.brand_id,
                              this.editItem.goods_name,
                              this.editItem.shop_price,  this.editItem.market_price, this.editItem.goods_quantity,
                              this.editItem.sold_quantity, this.editItem.goods_weight,
                              this.editItem.goods_brief, this.editItem.goods_desc,
                              this.editItem.thumb_img,
                              this.editItem.goods_img,
                              this.editItem.ori_img,  this.editItem.is_on_sale,
                              this.editItem.is_delete,  this.editItem.is_best,  this.editItem.is_new,
                              this.editItem.is_free_post, this.editItem.add_time,
                              this.editItem.last_update);


    for(let i=0; i<this.goodsArray.length; i++) {

      if (this.goodsArray[i].goods_id > newID) {

        newID = this.goodsArray[i].goods_id;
      }
    }

    newItem.goods_id = newID + 1;
    newItem.id      = newID + 1;

    console.log("will save ---- this.editItem, new ID: " );
    console.log(newItem);

    this.goodsArray.unshift(newItem);

    //this.editItem.cat_id = Number(this.editItem.cat_id);

    this.adminService.createOneNewGoods(newItem);

  }


  private getAllGoods(): Promise<Goods[]> {

    return this.adminService.getAllGoods()
        .then(goods => this.goodsArray = goods);
  }


  goBack(){

    //console.log(this.goodsArray);
    //console.log(this.subCategories);
    this.location.back();
  }


  // TODO: Remove this when we're done
  //get diagnostic() { return JSON.stringify(this.editItem); }

}
