
import { BrowserModule } from '@angular/platform-browser';
import { NgModule } from '@angular/core';
import { ReactiveFormsModule, FormsModule } from '@angular/forms';
import { HttpModule } from '@angular/http';
import { AppComponent } from './app.component';
import { routing, appRoutingProviders } from './app.routing';


import { PageDefault }    from './app.pagedefault';
import { HomePageComponent } from './home-page/home-page.component';

import { DetailComponent } from './detail/detail.component';
import { TeacherComponent } from './teacher/teacher.component';
import { DashboardComponent } from './back/dashboard/dashboard.component';
import { SearchComponent } from './search/search.component';
import { DataService }      from './services/data-service.service';
import { SearchService }   from './services/search.service';
import { GoodsService }   from './services/goods.service';
import { CartService }    from './services/cart.service';
import { OrderService }    from './services/order.service';
import { AdminService }    from './back/services/admin.service';

// Imports for loading & configuring the in-memory web api
import { InMemoryWebApiModule } from 'angular-in-memory-web-api';
import { InMemoryDataService }  from './services/in-memory-data.service';


// import './rxjs-extensions';   too big !!!!!!!!!!!!

// Observable class extensions
import 'rxjs/add/observable/of';
import 'rxjs/add/observable/throw';

// Observable operators
import 'rxjs/add/operator/catch';
import 'rxjs/add/operator/debounceTime';
import 'rxjs/add/operator/distinctUntilChanged';
import 'rxjs/add/operator/do';
import 'rxjs/add/operator/filter';
import 'rxjs/add/operator/map';
import 'rxjs/add/operator/switchMap';


import { SmallGoodsComponent } from './small-goods/small-goods.component';
import { TypePageComponent } from './type-page/type-page.component';
import { LoginComponent } from './login/login.component';
import { CartComponent } from './cart/cart.component';
import { OrderComponent } from './order/order.component';
import { AdminComponent } from './back/admin/admin.component';
import { EditComponent } from './edit/edit.component';
import { GoodsComponent } from './back/goods/goods.component';
import { EditGoodsComponent } from './back/edit-goods/edit-goods.component';


@NgModule({

  declarations: [
    AppComponent,
    HomePageComponent,
    PageDefault,
    DetailComponent,
    TeacherComponent,
    //HeroDetailComponent,
    DashboardComponent,
    SearchComponent,
    HomePageComponent,
    SmallGoodsComponent,
    TypePageComponent,
    LoginComponent,
    CartComponent,
    OrderComponent,
    AdminComponent,
    EditComponent,
    GoodsComponent,
    EditGoodsComponent

  ],

  imports: [
    BrowserModule,
    FormsModule,
    ReactiveFormsModule,
    routing,
    HttpModule,
    BrowserModule,
    InMemoryWebApiModule.forRoot(InMemoryDataService),
    //InMemoryWebApiModule.forRoot(HeroData)
    //InMemoryWebApiModule.forRoot(InMemoryDataService, {
    //  passThruUnknownUrl: true
    //})
  ],


  // Provider all service ...., share them
  providers: [
      appRoutingProviders,
      DataService,
      GoodsService,
      CartService,
      SearchService,
      OrderService,
      AdminService
  ],
  bootstrap: [AppComponent]

})

export class AppModule { }


