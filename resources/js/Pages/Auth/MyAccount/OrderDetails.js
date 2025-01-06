import { Heading6 } from "@/Components/Elements";
import { formatCurrency } from "@/Helpers/helpers";
import TableProductList from "@/Pages/Checkout/TableProductList";
import Layout from "./Layout";
import {Link} from "@inertiajs/inertia-react";

const orderDetails = ({ order }) => {
    return (
        <Layout title={"رقم الطلب: #" + order.order}>
            <div className="grid gap-y-20 md:grid-cols-12 md:gap-6">
                <div className="space-y-2 font-text col-span-1 md:col-span-6">
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
                </div>
                <div className="space-y-2 font-text col-span-1 md:col-span-6" style={{ textAlign: "left" }}>
                    {order.state === "complete" && order.paid === "no" &&(
                        <Link href={route("order-pay", [order.order])} className="rounded-md bg-slate-900 px-3.5 py-2.5 text-sm font-semibold text-white shadow-sm hover:bg-slate-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600 mt-8">ادفع الآن </Link>

                    )}
                </div>
            </div>

            <div>
                <TableProductList
                    products={order.products}
                    subTotal={order.sub_total}
                    discount={order.discount}
                    tax_percent={15}
                    tax_amount={(order.sub_total*15) /100}
                    total={order.total}
                />
            </div>
        </Layout>
    );
};

export default orderDetails;
