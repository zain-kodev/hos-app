import React from "react";
import TwoSection, { TwoSectionText, TwoSectionSubTitle, TwoSectionTitle } from "@/Components/TwoSection";
import { Link } from "@inertiajs/inertia-react";
const TwoSectionHours = () => {
    return (
        <TwoSection img="/img/archi-back-cropped.png" reverse={true}>
            <div className="text-center max-w-lg mx-auto">
                <TwoSectionSubTitle className="mb-1">
                    التصميم الداخلي
                </TwoSectionSubTitle>
                <TwoSectionText>

                    التصميم الداخلي، وتُعد الماده الهندسية المسؤولة عن إظهار القيمة الجمالية للفراغ او الحيز من حيث التعريف اللفظي، اما القيمة الحقيقة والمدلول العلمي للتصميم الداخلي فهو يعني أكثر من ذلك حيث ان التصميم الداخلي هو اختصاص يهتم بالفراغ والحيز من حيث الشكل والاظهار وعلم الوظيفة و الجمال النسبي
                </TwoSectionText>

                <div className="space-y-3 lg:px-10 ">
                    <div className="title flex justify-between">
                        <h6>النمط الحديث</h6>

                    </div>

                    <div className="title flex justify-between">
                        <h6>النمط الاسكندنافي</h6>

                    </div>

                    <div className="title flex justify-between">
                        <h6>النمط البوهيمي</h6>
                    </div>

                    <div className="title flex justify-between">
                        <h6>النمط الريفي</h6>
                    </div>

                    <div className="title flex justify-between">
                        <h6>النمط الحديث</h6>
                    </div>
                </div>
            </div>
        </TwoSection>
    );
};

export default TwoSectionHours;
