import {BaseModel} from "../../models/base.model.js";
import {useStore} from "pinia-class-store";


class SearchModel extends BaseModel {
    constructor() {
        super();
        this.search = undefined;
    }

    init(search) {
        this.search = search;
    }
}

export const searchModel = useStore.bind(undefined, SearchModel);
