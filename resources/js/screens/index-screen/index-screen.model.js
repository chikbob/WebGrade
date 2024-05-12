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

export const siteModel = useStore.bind(undefined, SiteModel);
