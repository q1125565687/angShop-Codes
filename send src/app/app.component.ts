import {Component, OnInit } from '@angular/core';

@Component({

  selector: 'app-root',
  templateUrl: './app.component.html',
  styleUrls: ['./app.component.css']

})

//export class AppComponent {

//export class AppComponent implements AfterContentInit {

  export  class AppComponent {


  //title = 'App-Component works!';

  //constructor(private elementRef: ElementRef) {
  //}

  constructor() {
  }



  ngAfterContentInit() {

    /*
    const tmp = document.createElement('div');

    const el = this.elementRef.nativeElement.cloneNode(true);

    tmp.appendChild(el);

    this.node = tmp.innerHTML;
    */


    // document.getElementById("hh").innerHTML = "Ming Jing !!";

  }

}
