import Breadcrumbs from "@/Components/Breadcrumbs";

import { Heading2, Heading3, Heading4, Heding5 } from "@/Components/Elements";
import AppLayout from "@/Layouts/AppLayout";
import { Link } from "@inertiajs/inertia-react";
import React from "react";
import CartProductList from "./CartProductList";
import SummaryPrice from "./SummaryPrice";

const ShoppingCart = (props) => {
    return (
        <AppLayout title="السلة">
            <Breadcrumbs
                data={[
                    { path: route("products"), name: "المنتجات" },
                    { name: "قائمة الخدمات المضافة" },
                ]}
            />

            <div className="py-section container">
                {props.products.length === 0 ? (
                    <div className=" text-center">
                        <p className="font-script text-4xl text-gray-400 lg:text-5xl">
                            قم بإضافة باقة - خدمة للسلة
                        </p>
                        <Heading2>السلة فارغة</Heading2>
                        <p className="mb-10 mt-8 font-text">
                            لم تقم بإضافة اي باقة - خدمة للسلة
                        </p>
                        <Link href={route('products')} className="btn btn-md">قائمة الباقات</Link>
                    </div>
                ) : (
                    <>
                    <div className="text-center">
                        <Link className="btn btn-md mb-4 " href={route("products")}>
                            مواصلة التسوق
                        </Link>
                    </div>
                        <CartProductList products={props.products} />

                        <SummaryPrice meta={props.meta} />

                        <div>
                            <Link
                                href={route("checkout")}
                                className="btn btn-md"
                            >
                                مواصلة لاكمال الطلب
                            </Link>
                        </div>
                    </>
                )}
            </div>
        </AppLayout>
    );
};

export default ShoppingCart;
