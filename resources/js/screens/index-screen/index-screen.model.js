import {BaseModel} from "../../models/base.model.js";
import {useStore} from "pinia-class-store";


class SiteModel extends BaseModel {
    constructor() {
        super();
        this.site = undefined;
    }

    init(site) {
        this.site = site;
    }
}

class ReviewModel extends BaseModel {
    constructor() {
        super();
        this.review = undefined;
    }

    init(review) {
        this.review = review;
    }
}


export const siteModel = useStore.bind(undefined, SiteModel);
export const reviewModel = useStore.bind(undefined, ReviewModel);
