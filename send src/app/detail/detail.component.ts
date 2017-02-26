import { Component, AfterContentInit } from '@angular/core';
import { ActivatedRoute, Params }   from '@angular/router';
import { Location }                 from '@angular/common';
import { Teacher, Goods }           from '../data/defineClass';
import { DataService }              from '../services/data-service.service';
import { GoodsService }             from '../services/goods.service';

// 导入switchMap运算符，之后会与路由参数Observable一起使用。
import 'rxjs/add/operator/switchMap';

//使用@Component装饰器创建元数据
@Component({
  //moduleId: module.id,
  selector: 'app-detail',
  templateUrl: './detail.component.html',
  styleUrls: ['./detail.component.css']
})


// 从ActivatedRoute服务的可观察对象params中取得id参数，
export class DetailComponent implements AfterContentInit {

  private teacher: Teacher;
  private oneGoods: Goods;
  private goodsArray: Array<any>;

  // For : route.params.subscribe(params => {}
  private sub: any;
  private parameterTab: number;   // Come from Url

  constructor(
      private dataService: DataService,
      private goodsService: GoodsService,
      private route: ActivatedRoute,
      private location: Location
  ) {
  }

  //ngOnInit(): void {
  ngAfterContentInit() {

    //console.log(this);

    this.sub = this.route.params.subscribe(params => {
      this.parameterTab = +params['goods_id']; // (+) converts string 'id' to a number
    });

    console.log("this.route.params = " + this.parameterTab);

    this.route.params
        .switchMap((params: Params) => this.goodsService.getOneGoodsByID(+params['goods_id']))
        .subscribe(oneGoods => this.goodsArray = oneGoods);

    }


  /*   Good way , too
  ngOnInit() {
    this.route.params.forEach((params: Params) => {
      let localID = params['id'];
      this.id = localID;
    });
    this.teacher = this.getOneData(this.id);
  }
  */

  save(): void {

    this.dataService.updateFromWebApi(this.teacher)
        .then(() => this.goBack());

    //this.dataService.updateLocal(this.teacher);
    //this.location.back();
  }

  goBack(): void {
    this.location.back();
  }

  private showCat() {

    console.log(" --------------- oneGoods :  " + this.oneGoods);
  }

}
