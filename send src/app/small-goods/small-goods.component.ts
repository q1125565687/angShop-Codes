/*
import { Component, OnInit, Input, AfterContentInit } from '@angular/core';
import { Goods }           from '../defineClass';

@Component({
  selector: 'app-small-goods',
  templateUrl: './small-goods.component.html',
  styleUrls: ['./small-goods.component.css']
})

export class SmallGoodsComponent implements AfterContentInit {
  @Input()
  goods: Goods;
  constructor() { }
  ngAfterContentInit() {
    console.log("Already in SmallGoodsComponent init ------------ this.goods");
    console.log(this.goods);
  }
}
*/

import { Component, Input } from '@angular/core';
import { Goods }           from '../data/defineClass';

@Component({

  selector: 'app-small-goods',

  templateUrl: './small-goods.component.html',
  styleUrls: ['./small-goods.component.css']


  /*
  template: `

 <!--
    <div *ngIf="hero">
      <h2>{{hero.goods_name}} details!</h2>
      <div><label>id: </label>{{hero.goods_id}}</div>
      <div>
        <label>name: </label>
        <input [(ngModel)]="hero.goods_name" placeholder="name"/>
      </div>
    </div>
   -->
    
    <h2> Here is : selector: my-hero-detail</h2>
    
<div class="row">
    <div class="col-xs-12 col-sm-3" ></div>
        <div class="col-xs-12 col-sm-6" >
            <div class="thumbnail" *ngIf="hero">

              <img src={{hero.thumb_img}} alt="...">
                    <div class="caption">
              
                    <h3>{{hero.goods_name}}</h3>
              
                    <p>{{hero.goods_id}} {{hero.goods_sn}} {{hero.shop_price}}</p>
              
                    <p><a href="/detail/detail/{{hero.goods_id}}" class="btn btn-primary" role="button" >Details</a>
              
                    <a href="#" class="btn btn-default" role="button">Add to Cart</a>
                   </p>
            </div>
        </div>
    </div>
</div>

    
  `
*/


})
export class SmallGoodsComponent {
  @Input()
  hero: Goods;
}


/*
 Copyright 2016 Google Inc. All Rights Reserved.
 Use of this source code is governed by an MIT-style license that
 can be found in the LICENSE file at http://angular.io/license
 */
