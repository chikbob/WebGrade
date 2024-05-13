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

export const reviewModel = useStore.bind(undefined, ReviewModel);
