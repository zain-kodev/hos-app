import Button from "@/Components/Button";
import Input from "@/Components/Input";
import Label from "@/Components/Label";
import ValidationErrors from "@/Components/ValidationErrors";
//import NotificationSuccess from "@/componentss/NotificationSuccess";
import { useForm } from "@inertiajs/inertia-react";
import Layout from "./Layout";
import Select from "@/Components/SelectInput";


const AccountDetails = (props) => {
    const { data, setData, processing, post, errors } = useForm({
        name: props.auth.user.name,
        phone: props.auth.user.phone,
        email: props.auth.user.email,
        email_confirmation: props.auth.user.email,
        city: props.auth.user.city,
        address: props.auth.user.address,

    });


    const handleSubmit = async (e) => {
        e.preventDefault();
        post(route("store_account_details"), { preserveScroll: true });
    };
    const onHandleChange = (event) => {
        setData(event.target.name, event.target.value);
    };
    return (
        <Layout title="تفاصيل الحساب">
            <ValidationErrors errors={errors} />
            <form onSubmit={handleSubmit}>
                <div className="grid grid-cols-1 md:grid-cols-2 gap-6 mb-4">
                    <div>
                        <Label forInput="name" value="الاسم الكامل *" />
                        <Input
                            className="w-full mt-1"
                            required={true}
                            handleChange={onHandleChange}
                            name="name"
                            value={data.name}
                        />
                    </div>
                    <div>
                        <Label forInput="email" value="رقم الجوال *" />
                        <Input
                            className="w-full mt-1"
                            required={true}
                            handleChange={onHandleChange}
                            name="phone"
                            value={data.phone}
                        />
                    </div>
                    <div>
                        <Label forInput="email" value="البريد الالكتروني *" />
                        <Input
                            className="w-full mt-1"
                            required={true}
                            type="email"
                            handleChange={onHandleChange}
                            name="email"
                            value={data.email}
                        />
                    </div>

                    <div>
                        <Label forInput="email" value="تأكيد البريد الالكتروني *" />
                        <Input
                            className="w-full mt-1"
                            required={true}
                            type="email"
                            handleChange={onHandleChange}
                            value={data.email_confirmation}
                            name="email_confirmation"
                        />
                    </div>
                    {/*<div>*/}
                    {/*    <Label forInput="email" value="المدينة *" />*/}
                    {/*    <Input*/}
                    {/*        className="w-full mt-1"*/}
                    {/*        required={true}*/}
                    {/*        handleChange={onHandleChange}*/}
                    {/*        name="city"*/}
                    {/*        value={data.city}*/}

                    {/*    />*/}
                    {/*</div>*/}
                    <div className="">
                        <Label forInput="email" value="المدينة *" />
                        <Select
                            options={props.cities}
                            name="city"
                            value={data.city}
                            className="w-full mt-1"
                            required={true}
                            handleChange={onHandleChange}
                            disabled={false}
                        />
                    </div>
                    <div className="md:col-span-2">
                        <Label forInput="email" value="العنوان *" />
                        <Input
                            className="w-full mt-1"
                            required={true}
                            handleChange={onHandleChange}
                            name="address"
                            value={data.address}
                        />
                    </div>
                </div>
                <Button  processing={processing}>حفظ البيانات</Button>
            </form>
        </Layout>
    );
};

export default AccountDetails;
