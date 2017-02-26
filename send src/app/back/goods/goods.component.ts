import { Component, OnInit } from '@angular/core';
import { ActivatedRoute, Params, Router }   from '@angular/router';
import { Location }                 from '@angular/common';
import { AdminService }           from '../services/admin.service';
import { Goods }        from '../../data/defineClass';


@Component({
  selector: 'app-goods',
  templateUrl: './goods.component.html',
  styleUrls: ['./goods.component.css']
})
export class GoodsComponent implements OnInit {

  private goodsArray: Array<any>;
  private myOrderBy: string;

  constructor(private adminService: AdminService,
              private router: Router,
              private location: Location) {
  }

  ngOnInit() {

    this.getGoods();

  }


  private getGoods(): Promise<Goods[]> {

    return this.adminService.getGoods()
        .then(goods => this.goodsArray = goods);
    //.then(categories => this.subCategories = categories)
    //.then(() => {
    //  this.subCategories = this.categories.filter(h => h.parent_id == 0)
    //})
  }

  orderByMe(x) {

    console.log(x);

    this.myOrderBy = x;
  }


  private addOne(item: Goods): void {

    console.log("Add a new one Goods ====== ");

    //this.editItem = new Category( 1, 1, 1, 'Category Name', 'Description');

    this.router.navigate( ['edit-goods/edit-goods',  { id: item.goods_id , type: 1}] );

  }

  // delete to in-memory-data
  private editOne(item: Goods): void {

    console.log("Edit a  Goods ====== ");

    this.router.navigate( ['edit-goods/edit-goods',  { id: item.goods_id , type: 3}] );

  }

  goBack(): void {
    this.location.back();
  }
}

