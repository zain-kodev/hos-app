import { Heading6 } from "@/Components/Elements";
import { formatCurrency } from "@/Helpers/helpers";
import TableProductList from "@/Pages/Checkout/TableProductList";
import Layout from "./Layout";
import React, { useEffect, useRef } from 'react';

import {Link} from "@inertiajs/inertia-react";
import TableTotal from "@/Pages/Checkout/TableTotal";

const OrderPay = ({ order, total , tax, service_tax}) => {

    const formContainerRef = useRef(null);

    useEffect(() => {
        if (formContainerRef.current) {
            window.Moyasar.init({
                element: formContainerRef.current,
                amount: total,
                //amount: 100,
                currency: "SAR",
                description: "E'mmar Package or Service",
                //publishable_api_key: "pk_test_AQpxBV31a29qhkhUYFYUFjhwllaDVrxSq5ydVNui",
                publishable_api_key: "pk_live_MHTy6Wf6RMNgMVbQSGpNp1zMtEtTwskoH637NxS8",
                callback_url: "https://ko-design.ae/thanksPayment",
                //callback_url: "http://store.test/thanksPayment",
                methods: ["creditcard", "applepay"],
                apple_pay: {
                    country: "SA",
                    label: "E'MMAR APP",
                    validate_merchant_url: "https://api.moyasar.com/v1/applepay/initiate"
                },
                metadata: {
                    "order" : order.order
                }
            });
        }
    }, [formContainerRef.current]);

    return (
        <Layout title={"رقم الطلب: #" + order.order}>
            <div className="grid gap-y-20 md:grid-cols-12 md:gap-6">
                <div className="md:col-span-8">
                    <div className="mysr-form" ref={formContainerRef} />
                </div>
                <div className="space-y-2 font-text md:col-span-4">
                    <div className=" items-center">
                        <span className="mr-2 font-semibold">رقم الجوال :</span>
                        {order.phone}
                    </div>
                    <div className=" items-center">
                        <span className="mr-2 font-semibold">العنوان :</span>
                        {order.address}
                    </div>
                    <div className=" items-center">
                        <span className="mr-2 font-semibold">ملاحظات :</span>
                        {order.note ? order.note : "لا توجد"}
                    </div>
                    <div className=" items-center">
                    <span className="mr-2 font-semibold">
                        تاريخ الطلب :
                    </span>
                        {order.created_at}
                    </div>
                    <TableTotal
                        products={order.products}
                        subTotal={order.sub_total}
                        discount={order.discount}
                        total={order.total}
                        ser_tax={service_tax}
                        tax = {tax}
                    />
                </div>
            </div>
        </Layout>
    );
};

export default OrderPay;

