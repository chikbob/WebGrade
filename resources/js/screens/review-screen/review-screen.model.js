import {BaseModel} from "../../models/base.model.js";
import {useStore} from "pinia-class-store";


class ReviewModel extends BaseModel {
    constructor() {
        super();
        this.review = undefined;
    }

    init(review) {
        this.review = review;
    }
}

class AllReviewModel extends BaseModel {
    constructor() {
        super();
        this.review = undefined;
    }

    init(review) {
        this.review = review;
    }
}

class AllSiteModel extends BaseModel {
    constructor() {
        super();
        this.site = undefined;
    }

    init(site) {
        this.site = site;
    }
}

export const reviewModel = useStore.bind(undefined, ReviewModel);
export const allReviewModel = useStore.bind(undefined, AllReviewModel);
export const allSiteModel = useStore.bind(undefined, AllSiteModel);
