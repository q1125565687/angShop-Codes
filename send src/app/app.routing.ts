
import { ModuleWithProviders }   from '@angular/core';
import { Routes, RouterModule }  from '@angular/router';
import { PageDefault }           from './app.pagedefault';
import { HomePageComponent }     from './home-page/home-page.component';

import { TeacherComponent}       from './teacher/teacher.component';
import { DashboardComponent}     from './back/dashboard/dashboard.component';
import { DetailComponent}        from './detail/detail.component';
import { TypePageComponent}      from './type-page/type-page.component';
import { LoginComponent}         from './login/login.component';
import { CartComponent}          from './cart/cart.component';
import { OrderComponent}         from './order/order.component';
import { AdminComponent}         from './back/admin/admin.component';
import { GoodsComponent}         from './back/goods/goods.component';
import { EditGoodsComponent}     from './back/edit-goods/edit-goods.component';

const appRoutes: Routes = [

  { path: 'home-page/home-page/:cat_id', component: HomePageComponent },
  { path: 'teacher/teacher/:search_Text', component: TeacherComponent },
  { path: 'teacher/teacher/:search_Text/:x', component: TeacherComponent },

  { path: 'dashboard/dashboard',      component: DashboardComponent },
  { path: 'detail/detail/:goods_id',  component: DetailComponent },

  { path: 'type-page/type-page/:cat_id', component: TypePageComponent },
  { path: 'type-page/type-page/:cat_id/:x', component: TypePageComponent },
  { path: 'type-page/type-page/:cat_id/:x/:y', component: TypePageComponent },
  { path: 'type-page/type-page/:cat_id/:x/:y/:z', component: TypePageComponent },
  { path: 'type-page/type-page/:cat_id/:x/:y/:z/:x', component: TypePageComponent },
  { path: 'type-page/type-page/:cat_id/:x/:y/:z/:x/:x', component: TypePageComponent },
  { path: 'type-page/type-page/:cat_id/:x/:y/:z/:x/:x/:x', component: TypePageComponent },
  { path: 'type-page/type-page/:cat_id/:x/:y/:z/:x/:x/:x/:x', component: TypePageComponent },
  { path: 'type-page/type-page/:cat_id/:x/:y/:z/:x/:x/:x/:x/:y', component: TypePageComponent },
  { path: 'type-page/type-page/:cat_id/:x/:y/:z/:x/:x/:x/:x/:y/:z', component: TypePageComponent },

    //  ??? @angular/router-deprecated Can change this long url ???


  { path: 'login/login',             component: LoginComponent },
  { path: 'cart/cart/:goods_id/:goods_name/:shop_price',  component: CartComponent },
  { path: 'cart/cart',               component: CartComponent },
  { path: 'order/order',             component: OrderComponent },
  { path: 'admin/admin/:id',         component: AdminComponent },
  { path: 'goods/goods',             component: GoodsComponent },
  { path: 'edit-goods/edit-goods',    component: EditGoodsComponent },   // ????? Should has /:id ???
  { path: 'edit-goods/edit-goods/:id/:type', component: EditGoodsComponent },   // ????? Should has /:id ???

  { path: '', redirectTo: '/type-page/type-page/11', pathMatch: 'full' },
  //{ path: '**', component: PageDefault }

  { path: 'type-page/type-page/:cat_id', component: TypePageComponent }
];


export const appRoutingProviders: any[] = [];
//在应用根部提供配置的路由器。
// forRoot方法提供了路由需要的路由服务提供商和指令，并基于当前浏览器 URL 初始化导航。
export const routing: ModuleWithProviders = RouterModule.forRoot(appRoutes);

/*
import { NgModule }             from '@angular/core';
import { RouterModule, Routes } from '@angular/router';

import { DashboardComponent }   from './dashboard.component';
import { HeroesComponent }      from './heroes.component';
import { HeroDetailComponent }  from './hero-detail.component';

const routes: Routes = [
  { path: '', redirectTo: '/dashboard', pathMatch: 'full' },
  { path: 'dashboard',  component: DashboardComponent },
  { path: 'detail/:id', component: HeroDetailComponent },
  { path: 'heroes',     component: HeroesComponent }
];

@NgModule({
  imports: [ RouterModule.forRoot(routes) ],
  exports: [ RouterModule ]
})
export class AppRoutingModule {}

*/


/*

IMPORTANT WEB SITE :  !!!!!!!!!!!!  ###########

 https://angular-2-training-book.rangle.io/handout/directives/ng_for_directive.html


 */
