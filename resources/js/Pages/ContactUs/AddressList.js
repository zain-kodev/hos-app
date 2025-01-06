import React from "react";

const AddressList = () => {
    return (
        <div className="bg-orange-50">
            <div className="py-section container">
                <div className="grid gap-y-8 md:grid-cols-2 lg:grid-cols-3 lg:gap-y-0 lg:gap-x-4">
                    <div className="text-center">
                        <h4 className="title mb-4 text-2xl">
                            العنوان
                        </h4>
                        <p className="font-text leading-7">
                            المملكة العربية السعودية <br />
                            hمنطقة مكة المكرمة <br />جده - شارع صاري - صاري الفرعي
                        </p>
                    </div>
                    <div className="text-center">
                        <h4 className="title mb-4 text-2xl">
                            التواصل
                        </h4>
                        <p className="font-text leading-7">
                            info@ko-design.ae <br />
                            management@ko-design.ae
                        </p>
                    </div>
                    <div className="text-center">
                        <h4 className="title mb-4 text-2xl">
                            هواتفنا
                        </h4>
                        <p className="font-text leading-7">
                            +966500662210 <br />
                        </p>
                    </div>
                </div>
            </div>
        </div>
    );
};

export default AddressList;
