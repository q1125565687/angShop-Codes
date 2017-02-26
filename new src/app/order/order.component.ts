import { Component, OnInit }  from '@angular/core';
import { ActivatedRoute, Params }   from '@angular/router';
import { OrdInfo, OrdGoods }            from '../data/defineClass';
import { OrderService }       from '../services/order.service';
import { Location }             from '@angular/common';

@Component({
  selector: 'app-order',
  templateUrl: './order.component.html',
  styleUrls: ['./order.component.css']
})

export class OrderComponent implements OnInit {


  private ordersArray: Array<any>;

  private ordGoodsArray: Array<any>;

  //private oneOrdGoodsArray: Array<any>;

  private selectedOrder: OrdInfo;

  private selectedOrdGoods: Array<OrdGoods>;

  item : OrdGoods;

  constructor(
      private orderService: OrderService,
      private route: ActivatedRoute,         //?? Using ??? Role ????  :  For --> Observable<Params>
      private location: Location
  ) {}


  ngOnInit() {

    this.getOrder();
    this.getOrdGoods();

  }


  private getOrder(): Promise<OrdInfo[]> {

    return this.orderService.getOrdInforItems()
        .then(orders => this.ordersArray = orders);
  }


  private getOrdGoods(): Promise<OrdGoods[]> {

    return this.orderService.getOrdGoodsItems()
        .then(orders => this.ordGoodsArray = orders);
  }


  onSelect(order: OrdInfo): void {

    this.selectedOrder = order;

    this.selectedOrdGoods = this.ordGoodsArray.filter(h => h.ordinfo_id === order.ordinfo_id);

    //console.log(this.selectedOrdGoods);

  }

  goBack(): void {
    this.location.back();
  }

}
