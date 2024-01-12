import { type UserFormType } from "../types/userForm";

export class ContactFormApiService {
    async submitForm(data: UserFormType): Promise<String> {
        // eslint-disable-next-line no-useless-catch
        try {
            const response = await fetch(import.meta.env.VITE_BACKEND_URL + '/api/submit-form', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                },
                body: JSON.stringify(data),
            });

            if (!response.ok) {
                throw new Error('Failed to submit form');
            }

            return await response.json();
        } catch (error) {
            throw error;
        }
    }
}