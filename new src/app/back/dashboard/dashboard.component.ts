import { Component, OnInit } from '@angular/core';
//import { Teacher }  from '../data/defineClass';
import { DataService } from '../../services/data-service.service';

@Component({

  selector: 'app-dashboard',

  templateUrl: './dashboard.component.html',

  styleUrls: ['./dashboard.component.css']

})
export class DashboardComponent implements OnInit {


  //teachers: Teacher[] = [];

  constructor(private dataService: DataService) {

  }

  ngOnInit(): void {


    //this.dataService.getHeroesFromWebApi()

      //  .then(teachers => this.teachers = teachers.slice(1, 5));
  }

}
