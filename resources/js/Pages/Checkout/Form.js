import { Heading3 } from "@/Components/Elements";
import Input from "@/Components/Input";
import Textarea from "@/Components/Textarea";
import { usePage } from "@inertiajs/inertia-react";

import React from "react";
import Label from "@/Components/Label";
import Select from "@/Components/SelectInput";
import SelectInstallment from "@/Components/SelectInstallments";

const Form = ({ data, setData,cities, installments }) => {
    const { auth } = usePage().props;
    const onHandleChange = (e) => {
        let target = e.target;
        setData(target.name, target.value);
        console.log(target.value);
    };
    return (
        <div className="mb-14 grid gap-8 lg:grid-cols-2">
            <div className="space-y-5">
                <Heading3>بياناتك الاساسية</Heading3>
                <div>
                    <label className="font-text text-sm" htmlFor="name">
                        الاسم الكامل
                    </label>
                    <Input
                        className="disabled:bg-gray-200 disabled:text-gray-400"
                        disabled={true}
                        value={auth.user.name}
                        name="name"
                    />
                </div>
                <div>
                    <label className="font-text text-sm" htmlFor="email">
                        البريد الالكتروني
                    </label>
                    <Input
                        className="disabled:bg-gray-200 disabled:text-gray-400"
                        disabled={true}
                        value={auth.user.email}
                        name="email"
                        type="email"
                    />
                </div>
                <div className="">
                    <Label forInput="email" value="المدينة *" />
                    <Select
                        options={cities}
                        name="city"
                        value={data.city}
                        className="w-full mt-1"
                        required={true}
                        handleChange={onHandleChange}
                        disabled={false}
                    />
                </div>
                {/*<div className="">*/}
                {/*    <Label forInput="installment" value="نظام الاقساط *" />*/}
                {/*    <SelectInstallment*/}
                {/*        options={installments}*/}
                {/*        name="installment"*/}
                {/*        value={data.installment}*/}
                {/*        className="w-full mt-1"*/}
                {/*        required={true}*/}
                {/*        handleChange={onHandleChange}*/}
                {/*        disabled={false}*/}
                {/*    />*/}
                {/*</div>*/}
                <div>
                    <label className="font-text text-sm" htmlFor="address">
                        العنوان
                    </label>
                    <Input
                        handleChange={onHandleChange}
                        value={data.address}
                        name="address"
                    />
                </div>
                <div>
                    <label className="font-text text-sm" htmlFor="phone">
                        رقم الجوال (تاكد من تفعيل رقم الواتساب عليه)
                    </label>
                    <Input
                        handleChange={onHandleChange}
                        value={data.phone}
                        name="phone"
                    />
                </div>
            </div>
            <div className="space-y-5">
                <Heading3>ملاحظات الطلب</Heading3>
                <div>
                    <label className="font-text text-sm" htmlFor="name">
                        ملاحظات الطلب (اختياري)
                    </label>
                    <Textarea
                        name="note"
                        handleChange={onHandleChange}
                        value={data.note}
                    ></Textarea>
                </div>
            </div>
        </div>
    );
};

export default Form;
