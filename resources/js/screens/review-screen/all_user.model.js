import {BaseModel} from "../../models/base.model.js";
import {useStore} from "pinia-class-store";


class AllUserModel extends BaseModel {
    constructor() {
        super();
        this.user = undefined;
    }

    init(user) {
        this.user = user;
    }
}

export const allUserModel = useStore.bind(undefined, AllUserModel);
