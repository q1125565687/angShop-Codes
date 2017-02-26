

export class  Category {
    constructor(
        public id          :   number,
        public cat_id      :   number,
        public parent_id   :   number,
        public cat_name    :   string,
        public intro       :   string

    ){}
}


export class MenuItem {
    parameterID: number;
    path       : string;
    linkName   : string;
    active     : string;
    random     : string;
}

/*
export class Hero {
    id:     number;
    name:   string;
}
*/


export class Hero {
    constructor(
        public id       : number,
        public name     : string,
        public power    : string,

        // optional field (alterEgo).
        public alterEgo?: string
    ) {  }
}



export class Teacher {
    id:     number;
    name:   string;
    age:    string;
    picture: string;
    courseID: number;
}


export class   Goods {
    constructor(
        public id:             number,
        public cat_id:         number,
        public goods_id:       number,
        public goods_sn:       string,

        public brand_id:       number,
        public goods_name:     string,
        public shop_price:     number,
        public market_price:   number,
        public goods_quantity:   number,
        public sold_quantity:    number,
        public goods_weight:   number,
        public goods_brief:    string,
        public goods_desc:     string,
        public thumb_img:      string,
        public goods_img:      string,
        public ori_img:        string,
        public is_on_sale:     boolean,
        public is_delete:      boolean,
        public is_best:        boolean,
        public is_new:         boolean,
        public is_free_post:   boolean,
        public add_time:       Date,
        public last_update:    Date){}
}



export class   CartItem {
    constructor(
        public id          :    number,
        public goods_id    :     number,
        public goods_name  :     string,
        public shop_price  :     number,
        public quantity    :     number){}

}


export class   OrdInfo {

    ordinfo_id  : 	number;
    ord_sn	    :   string;
    user_id     : 	number;
    mobile 		:   string;
    money 		:   number;
    note 		:   string;
}

/*
export class   Ordinfo {

    ordinfo_id  : 	number;
    ord_sn	    :   string;
    user_id     : 	number;
    xm 		    :   string;
    mobile 		:   string;
    address 	: 	string;
    paytype 	:	number;
    paystatus   : 	number;
    money 		:   number;
    note 		:   string;
    ordtime		:   Date;
}
*/


export class    OrdGoods {
    constructor(
        public ordgoods_id : number,
        public ordinfo_id  : number,
        public goods_id    : number,
        public goods_name  : string,
        public shop_price  : number,
        public quantity    : number)  {}
}

/*
export class Hero {
    constructor(
        public id: number,
        public name: string) { }
}

*/
