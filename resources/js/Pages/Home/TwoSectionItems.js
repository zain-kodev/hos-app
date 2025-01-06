import TwoSection, {
    TwoSectionSubTitle,
    TwoSectionText,
    TwoSectionTitle,
} from "@/Components/TwoSection";
import { Link } from "@inertiajs/inertia-react";
import React from "react";

const TwoSectionItems = () => {
    return (
        <TwoSection img="/img/ko.png">
            <div className="text-center max-w-lg mx-auto">
                <TwoSectionTitle>التصميم المعماري</TwoSectionTitle>
                <TwoSectionText>

                    هي خدمات منصة إعمار الاحترافية، وتعمل جميع الخدمات بطريقة تسلسلية متتابعة وفق خطوات تنفيذ المشروع ابتدأ من رسم الفكرة المعمارية وتقسيم الأرض وصولاً الى توريد المنتجات من منصة إعمار الصين بكل سهولة ويسر، ونظراً لتطوير قدرات منصة إعمار في الإخراج والإنتاج المعماري وتطوير جودة المنتجات وكثافتها نتيح لكم إمكانية تصميم الباقة وفق متطلباتكم الخاصه وهي العامل الأقوى في خفظ سعر
                </TwoSectionText>
                <TwoSectionSubTitle className="mb-16">
                    اطلع على آخر الخدمات
                </TwoSectionSubTitle>

                <div>
                    <Link href="#" className="btn btn-md">
                        إشترك الآن
                    </Link>
                </div>
            </div>
        </TwoSection>
    );
};

export default TwoSectionItems;
