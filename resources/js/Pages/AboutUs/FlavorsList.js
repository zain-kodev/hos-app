import { Heading2 } from "@/Components/Elements";
import { formatCurrency } from "@/Helpers/helpers";
import React from "react";
import Products from "../Products/Products";

const FlavorsList = ({ products }) => {
    return (
        <div className="py-section container">
            <div className="mb-14 text-center">
                <p className="mb-1 font-script text-4xl text-gray-400 lg:text-5xl">
                    منصة إعمار
                </p>
                <Heading2 className=" mb-5 ">
                    ALL IN APP
                </Heading2>
                <p className="font-text">
                    منصة إعمار لخدمات الاعمال هي منصة تقنية تهدف الى اختصار الوقت والجهد في تنظيم القطاع العمراني بجميع تخصصاته، وتهدف المنصة الى خلق سوق تنافسية احترافية بين جميع مزودي المنتجات ومقدمي الخدمات والمستهلك النهائي في منصة متكاملة وتطبيقات الإلكترونية متعددة.
                </p>
            </div>
            {/*<div >*/}
            {/*    <div className=" grid gap-x-8 gap-y-6 md:grid-cols-2 lg:grid-cols-3">*/}
            {/*        {products.map((item, key) => (*/}
            {/*            <div key={key}>*/}
            {/*                <div className="title mb-2 flex">*/}
            {/*                    <h6 >{item.name}</h6>*/}
            {/*                    <div className="flex-grow border-b-2  border-dotted border-gray-700 "></div>*/}
            {/*                    <div >*/}
            {/*                        {formatCurrency(item.price)}*/}
            {/*                    </div>*/}
            {/*                </div>*/}
            {/*                <div className="font-text ">*/}
            {/*                    {item.sentence}*/}
            {/*                </div>*/}
            {/*            </div>*/}
            {/*        ))}*/}
            {/*    </div>*/}
            {/*</div>*/}
        </div>
    );
};

export default FlavorsList;
