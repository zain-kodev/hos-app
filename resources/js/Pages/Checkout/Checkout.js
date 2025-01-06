import Breadcrumbs from "@/Components/Breadcrumbs";
import Button from "@/Components/Button";
import { Heading3 } from "@/Components/Elements";
import ValidationErrors from "@/Components/ValidationErrors";

import AppLayout from "@/Layouts/AppLayout";
import { useForm } from "@inertiajs/inertia-react";
import React from "react";
import Form from "./Form";
import TableProductList from "./TableProductList";

import YourOrder from "./YourOrder";

const Checkout = (props) => {
    const { data, setData, post, processing, errors } = useForm({
        address: props.auth.user.address,
        phone: props.auth.user.phone,
        city: props.auth.user.city,
        note: "",
    });

    const handleSubmit = async (event) => {
        event.preventDefault();

        post(route("checkout_store"), { preserveScroll: true });
    };
    return (
        <AppLayout title="إكمال الطلب">
            <Breadcrumbs
                data={[
                    { path: route("shopping-cart.index"), name: "السلة" },
                    { name: "إكمال الطلب" },
                ]}
            />
            <div className="py-section container">
                <ValidationErrors errors={errors} />
                <div>
                    <Form data={data} cities={props.cities} installments={props.installments} setData={setData} />
                    <div className="mb-10">
                        <Heading3 className="mb-4">طلبك</Heading3>
                        <TableProductList
                            products={props.products}
                            subTotal={props.meta.sub_total}
                            discount={props.meta.discount}
                            tax_percent={props.meta.tax_percent}
                            tax_amount={props.meta.tax_amount}
                            total={props.meta.total}
                        />
                    </div>
                    <p className="mb-10 font-text">
                        سيتم استخدام بياناتك الشخصية لمعالجة طلبك ودعم تجربتك على هذا الموقع ولأغراض أخرى موضحة في سياسة الخصوصية الخاصة بنا.
                    </p>
                    <div onClick={handleSubmit}>
                        <Button processing={processing} type="button">
                            ارسال الطلب
                        </Button>
                    </div>
                </div>
            </div>
        </AppLayout>
    );
};

export default Checkout;
