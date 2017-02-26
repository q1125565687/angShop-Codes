import { Component, OnInit } from '@angular/core';
import { Router, ActivatedRoute }            from '@angular/router';
import { Observable }        from 'rxjs/Observable';
import { Subject }           from 'rxjs/Subject';

import { SearchService } from '../services/search.service';

import { Teacher }  from '../data/defineClass';
import { FormGroup, FormBuilder, FormControl, Validators } from '@angular/forms';


import 'rxjs/add/operator/debounceTime';
import 'rxjs/add/operator/map';

@Component({
  //moduleId: module.id,
  selector: 'search',
  templateUrl: './search.component.html',
  styleUrls: [ './search.component.css' ],
  providers: [SearchService]
})

export class SearchComponent implements OnInit {

  teachers: Observable<Teacher[]>;

  // Subject（主题）是一个可观察的事件流中的生产者。
  // searchTerms生成一个产生字符串的Observable，用作按名称搜索时的过滤条件。

  private searchTerms = new Subject<string>();

  static  urlFlag = 1;


  // For : route.params.subscribe(params => {}
  private sub: any;
  //public  searchText = "123";   // Come from Url

  myForm : FormGroup;

  constructor(
      private searchService: SearchService,
      private route: ActivatedRoute,
      private router: Router) {
  }

  // Push a search term into the observable stream.
  //search(term: string): void {
   // this.searchTerms.next(term);
  //}

  ngOnInit(): void {

    // define a form:
    this.myForm = new FormGroup({

      // For default input
      searchText: new FormControl('')
      //searchText: new FormControl('iPhone')

    });


    /*
    this.teachers = this.searchTerms
        .debounceTime(300)        // wait for 300ms pause in events
        .distinctUntilChanged()   // ignore if next search term is same as previous
        .switchMap(term => term   // switch to new observable each time
            // return the http search observable
            ? this.searchService.search(term)
            // or the observable of empty heroes if no search term
            : Observable.of<Teacher[]>([]))
        .catch(error => {
          // TODO: real error handling
          console.log(error);
          return Observable.of<Teacher[]>([]);
        });
        */

  }

  /*
  private gotoDetail(teacher: Teacher): void {

    let link = ['/detail/detail', teacher.id];
    this.router.navigate(link);
  }
*/

  private startSearch() : void {

    let link;

    if ( SearchComponent.urlFlag == 1 ) {

      link = ['/teacher/teacher', this.myForm.value.searchText];

      SearchComponent.urlFlag = 0;

    } else {

      //let link = ['/teacher/teacher', this.myForm.value.searchText];

      var str = '/teacher/teacher/' + this.myForm.value.searchText;

      link = [str, this.myForm.value.searchText];

      SearchComponent.urlFlag = 1;
    }

    console.log("link : ", link);

    this.router.navigate(link);
  }
}


/*

!!!!!! Important For Form *********


 https://scotch.io/tutorials/using-angular-2s-model-driven-forms-with-formgroup-and-formcontrol

 */
